<?php

namespace App\Http\Controllers\Auth;

use App\Events\Account\TwoFactorAuthenticationTokenRequested;
use App\Http\Requests\Account\Security\VerifyTwoFactorAuth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TwoFactorLoginController extends Controller
{
    protected $redirectTo = '/account';

    public function __construct()
    {
        if (!session()->has('two_factor')) {
            return redirect()->route('login');
        };

    }

    public function index()
    {
        return view('auth.twofactor.index');
    }

    public function verify(VerifyTwoFactorAuth $request)
    {
        Auth::loginUsingId($request->user()->id, session('two_factor')->remember);

        session()->forget('two_factor');

        return redirect()->intended($this->redirectPath());
    }

    public function resend(Request $request)
    {
        $user = User::find(session('two_factor')->user_id);

        event(new TwoFactorAuthenticationTokenRequested($user));

        return redirect()->back()->with('success',
            ['title' => 'Security token resent', 'message' => 'We have resent a security code to your phone.']
        );
    }

    protected function redirectPath()
    {
        return $this->redirectTo;
    }
}
