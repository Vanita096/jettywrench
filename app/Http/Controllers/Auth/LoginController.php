<?php

namespace App\Http\Controllers\Auth;

use App\Events\Account\TwoFactorAuthenticationTokenRequested;
use App\Http\Controllers\Controller;
use App\TwoFactor\TwoFactor;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return route('account.organizations.select');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], [
            'required' => 'This field is required.'
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->twoFactorEnabled()) {
            return $this->startTwoFactorAuthentication($request, $user);
        }
    }

    protected function startTwoFactorAuthentication(Request $request, $user)
    {
        session()->put('two_factor', (object) [
            'user_id' => $user->id,
            'remember' => $request->has('remember')
        ]);

        $this->guard()->logout();

        event(new TwoFactorAuthenticationTokenRequested($user));

        return redirect()->route('login.twofactor.index')->with('success', ['title' => 'Check your phone', 'message' => 'A security code was sent to you.']);
    }

}
