<?php

namespace App\Http\Controllers\Tenant\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        return view('tenant.admin.settings.index');
    }
}
