@extends('layouts.account')

@section('title', 'Change password')
@section('heading', 'Change password')
@section('return')
    <a href="{{ route('account.security.index') }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Security & Privacy</a>
@endsection

@section('account.content')

    <form action="{{ route('account.security.password.store') }}" method="post">
    @csrf

    @component('includes.partials.forms.columns')

        @slot('title', 'Current password')

        <div class="card">
            <div class="card-body">
                @component('includes.partials.forms.form_group', ['id' => 'password', 'type' => 'password'])
                    Current password
                @endcomponent
            </div>
        </div>

    @endcomponent

    @component('includes.partials.forms.columns')

        @slot('title', 'New password')
        @slot('subtitle', 'Out with the old, in with the new')

        <div class="card">
            <div class="card-body">
                @component('includes.partials.forms.form_group', ['id' => 'newPassword', 'type' => 'password'])
                    New password

                    @slot('help_text', 'Must be at least 6 characters')

                @endcomponent

                @component('includes.partials.forms.form_group', ['id' => 'newPasswordConfirmation', 'type' => 'password'])
                    Confirm new password
                @endcomponent
            </div>
        </div>

    @endcomponent

    <div class="row mt-4">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-lg float-right">Save</button>
        </div>
    </div>

    </form>

@endsection
