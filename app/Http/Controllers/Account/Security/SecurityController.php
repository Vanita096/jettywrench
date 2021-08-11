<?php

namespace App\Http\Controllers\Account\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecurityController extends Controller
{
    public function index()
    {
        return view('account.security.index');
    }
}
