<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\StoreProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Bouncer;

class ProfileController extends Controller
{
    public function index()
    {
        return view('account.profile.index');
    }

    public function store(StoreProfile $request)
    {
        $request->user()->update($request->only('first_name', 'last_name', 'email'));

        if ($request->has('avatar')) {
            $request->user()
                ->addMediaFromRequest('avatar')
                ->withCustomProperties(['isPublic' => true])
                ->toMediaCollection('avatars');
        }

        return redirect()->route('account.index')->with('success', 'Personal information updated successfully.');
    }
}
