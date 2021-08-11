<?php

namespace App\Http\Controllers\Account\Security;

use App\Http\Requests\Account\Security\StorePassword;
use App\Mail\Account\Security\PasswordUpdated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function index()
    {
        return view('account.security.password.index');
    }

    public function store(StorePassword $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->new_password),
            'password_updated_at' => Carbon::now(),
        ]);

        Mail::to($request->user())->send(new PasswordUpdated($request->user()));

        return redirect()->route('account.security.index')->withSuccess('Password successfully updated.');

    }
}
