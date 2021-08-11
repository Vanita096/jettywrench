<?php

namespace App\Http\Controllers\Account\Security;

use App\Events\Account\TwoFactorAuthenticationRegistered;
use App\Http\Requests\Account\Security\DisableTwoFactorAuth;
use App\Http\Requests\Account\Security\StoreTwoFactorAuth;
use App\Http\Requests\Account\Security\VerifyTwoFactorAuth;
use App\Models\Country;
use App\TwoFactor\TwoFactor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwoFactorAuthController extends Controller
{
    public function index()
    {
        $country_dial_codes = Country::all()->mapWithKeys(function ($item) {
            return [$item['name'] . ' (' . $item['dial_code'] . ')' => $item['id']];
        });

        return view('account.security.twofactor.index', compact('country_dial_codes'));
    }

    public function store(StoreTwoFactorAuth $request, TwoFactor $twoFactor)
    {
        $user = $request->user();

        $country = Country::find($request->dial_code);

        $user->twoFactor()->create([
            'phone' => $request->phone,
            'dial_code' => $country->dial_code,
        ]);

        if($response = $twoFactor->register($user)) {
            $user->twoFactor()->update([
                'identifier' => $response->user->id
            ]);
        }

        event(new TwoFactorAuthenticationRegistered($user));

        return redirect()->route('account.security.twofactor.index')->with('success', ['title' => 'Check your phone', 'message' => 'A verification code has been sent to (***) *** - ' . substr($user->twoFactor->phone, -4) ]);

    }

    public function verify(VerifyTwoFactorAuth $request)
    {
        $request->user()->twoFactor()->update([
            'verified' => true
        ]);

        return redirect()->route('account.security.index')
            ->withSuccess('Two-step verification has been successfully turned on');
    }

    public function destroy(DisableTwoFactorAuth $request, TwoFactor $twofactor)
    {
        $user = $request->user();

        if ($twofactor->delete($user)) {
            $request->user()->twoFactor()->delete();
        }

        return redirect()->route('account.security.index')->withSuccess(['title' => 'Two-step verification is turned off', 'message' => 'You will only need your email and password to login.']);
    }

    public function cancel(Request $request, TwoFactor $twofactor)
    {
        $user = $request->user();

        if ($twofactor->delete($user)) {
            $request->user()->twoFactor()->delete();
        }

        return redirect()->route('account.security.index')->withSuccess(['title' => 'Device verification cancelled', 'message' => 'Two-step verification setup has been cancelled. You will only need your email and password to login.']);
    }

    public function resend(Request $request)
    {
        event(new TwoFactorAuthenticationRegistered($request->user()));

        return redirect()->back()->with('success',
            ['title' => 'Security token resent', 'message' => 'We have resent a security code to your phone.']
        );
    }
}
