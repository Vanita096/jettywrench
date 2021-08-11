<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Events\Tenant\TenantWasCreated;
use App\Http\Requests\StoreOrganization;
use App\Models\Organization;
use Illuminate\Http\Request;
use Bouncer;

class OrganizationController extends Controller
{
    public function index()
    {
        return view('account.organizations.index');
    }

    public function select()
    {
        return view('account.organizations.select');
    }

    public function create()
    {
        return view('account.organizations.create');
    }

    public function store(StoreOrganization $request)
    {
        $organization = Organization::make([
            'name' => $request->name,
            'subdomain' => $request->subdomain,
            'description' => $request->description,
            'website' => $request->website,
        ]);

        // Add the authenticated user to the organization
        $request->user()->organizations()->save($organization);

        // Make the authenticated user the admin of the organization (tenant)
        Bouncer::scope()->to($organization->id)->onlyRelations();
        $request->user()->assign('admin');

        event(new TenantWasCreated($organization));

        return redirect()->route('tenant.admin.dashboard', $organization->subdomain);
    }
}
