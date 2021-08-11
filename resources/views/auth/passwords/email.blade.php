@extends('layouts.auth')

@section('title', 'Forgot your password?')
@section('heading', 'Forgot your password?')

@section('subheading')
    <p>Enter the email address you used to sign up and we'll send you instructions to reset your password.</p>
@endsection

@section('auth.content')
    <form action="{{ route('password.email') }}" method="post">

        @csrf

        @component('includes.partials.forms.form_group', ['id' => 'email', 'type' => 'email', 'size' => 'lg', 'autofocus' => true])
            Email

            @slot('example')
                E.g. hello@jettywrench.com
            @endslot

        @endcomponent

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Send Reset Instructions</button>

        <p class="text-center text-muted mt-4">Remember your password? <a href="{{ route('login') }}" class="text-info">Log in</a></p>

    </form>
@endsection
