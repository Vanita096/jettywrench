@extends('layouts.dashboard')

@section('title', 'Settings')
@section('heading', 'Settings')

@section('dashboard.content')
    <hr>
    <div class="card-deck">
        <a href="{{ route('tenant.admin.settings.general.index', request()->tenant()->subdomain) }}" class="card">
            <div class="card-body">
                <h5 class="card-title">General</h5>
                <p class="card-text text-muted">View and update your organization details</p>
            </div>
        </a>
        <a href="{{ route('account.security.index') }}" class="card">
            <div class="card-body">
                <h5 class="card-title">Locations</h5>
                <p class="card-text text-muted">Manage the places that you do business from</p>
            </div>
        </a>
        <a href="{{ route('account.organizations.index') }}" class="card">
            <div class="card-body">
                <h5 class="card-title">Accounts</h5>
                <p class="card-text text-muted">Manage your accounts and permissions</p>
            </div>
        </a>
    </div>

    {{--<div class="card-deck mt-4">--}}
    {{--<a href="#" class="card">--}}
    {{--<div class="card-body">--}}
    {{--<h5 class="card-title">Email addresses</h5>--}}
    {{--<p class="card-text text-muted">View and update your account email addresses</p>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--<a href="#" class="card">--}}
    {{--<div class="card-body">--}}
    {{--<h5 class="card-title">Plans</h5>--}}
    {{--<p class="card-text text-muted">View and update your current plan</p>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--<a href="#" class="card">--}}
    {{--<div class="card-body">--}}
    {{--<h5 class="card-title">Deactivate</h5>--}}
    {{--<p class="card-text text-muted">Export your data and close your account</p>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}

@endsection
