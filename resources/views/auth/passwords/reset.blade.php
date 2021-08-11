@extends('layouts.auth')

@section('title', 'Enter your new password')
@section('heading', 'Enter your new password')

@section('subheading')
    <p>Enter the email address of your account and your new password (twice).</p>
@endsection

@section('auth.content')
    <form action="{{ route('password.request') }}" method="post">

        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        @component('includes.partials.forms.form_group', ['id' => 'email', 'type' => 'email', 'size' => 'lg', 'autofocus' => true])
            Email

            @slot('example')
                E.g. hello@jettywrench.com
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'password', 'type' => 'password', 'size' => 'lg'])
            New Password

            @slot('example')
                E.g. My secret password
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'passwordConfirmation', 'type' => 'password', 'size' => 'lg'])
            Confirm New Password

            @slot('example')
                E.g. My secret password (Again)
            @endslot

        @endcomponent

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Reset password</button>

    </form>
@endsection


