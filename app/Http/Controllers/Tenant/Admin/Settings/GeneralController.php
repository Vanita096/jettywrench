<?php

namespace App\Http\Controllers\Tenant\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function index()
    {
        return view('tenant.admin.settings.general.index');
    }

    public function store(Request $request)
    {
        $request->tenant()->update([
            'name' => $request->name,
            'subdomain' => $request->subdomain,
            'description' => $request->description,
            'website' => $request->website
        ]);

        if ($request->has('logo')) {
            $request->tenant()
                ->addMediaFromRequest('logo')
                ->withCustomProperties(['isPublic' => true])
                ->toMediaCollection('logos');
        }

        return back()->with('success', 'General settings saved.');
    }
}
