@extends('layouts.account')

@section('title', 'Security & Privacy')
@section('heading', 'Security & Privacy')
@section('return')
    <a href="{{ route('account.index') }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Account</a>
@endsection

@section('account.content')

        @component('includes.partials.forms.columns')

            @slot('title', 'Password')
            @slot('subtitle', 'Set a unique password to secure your Jetty Wrench account.')

            <div class="card">
                <div class="card-body">
                    <a href="{{ route('account.security.password.index') }}" class="btn btn-primary mb-3">Change password</a>
                    <span class="d-block">Your password was <strong>{{ auth()->user()->password_updated_at ? 'updated ' . auth()->user()->password_updated_at->diffForHumans() : 'never updated' }}</strong></span>
                </div>
            </div>

        @endcomponent


        @component('includes.partials.forms.columns')

            @slot('title', 'Two-step verification')
            @slot('subtitle', 'Require a security code in addition to your password.')

            <div class="card">
                <div class="card-body">
                    @if(auth()->user()->twoFactorEnabled())
                        <a href="{{ route('account.security.twofactor.index') }}" class="btn btn-danger">Turn off two-step verification</a>
                    @else

                        @if(auth()->user()->twoFactorPendingVerification())
                            <p>A verification code has been sent to (***) *** - <strong>{{ substr(auth()->user()->twoFactor->phone, -4) }}</strong></p>
                            <a href="{{ route('account.security.twofactor.index') }}" class="btn btn-outline-primary">Verify device</a>
                            <a href="{{ route('account.security.twofactor.cancel') }}" onclick="event.preventDefault(); document.getElementById('cancel-two-factor-form').submit();" class="btn btn-link text-danger">Cancel verification</a>
                            <form id="cancel-two-factor-form" action="{{ route('account.security.twofactor.cancel') }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        @else
                            <a href="{{ route('account.security.twofactor.index') }}" class="btn btn-primary">Turn on two-step verification</a>
                        @endif

                    @endif
                </div>
            </div>

        @endcomponent

@endsection
