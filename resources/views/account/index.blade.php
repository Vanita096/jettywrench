@extends('layouts.account')

@section('title', 'Account')
@section('heading', 'Account')

@section('account.content')
    <hr>
    <div class="card-deck">
        <a href="{{ route('account.profile.index') }}" class="card">
            <div class="card-body">
                <h5 class="card-title">Personal Information</h5>
                <p class="card-text text-muted">View and edit your personal details</p>
            </div>
        </a>
        <a href="{{ route('account.security.index') }}" class="card">
            <div class="card-body">
                <h5 class="card-title">Security &amp; Privacy</h5>
                <p class="card-text text-muted">Update your password and two-step verification settings</p>
            </div>
        </a>
        <a href="{{ route('account.organizations.index') }}" class="card">
            <div class="card-body">
                <h5 class="card-title">Organizations</h5>
                <p class="card-text text-muted">Manage your organizations</p>
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
