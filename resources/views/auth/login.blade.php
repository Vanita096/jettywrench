@extends('layouts.auth')

@section('title', 'Log in')
@section('heading', 'Log in')

@section('auth.content')
    <form action="{{ route('login') }}" method="post">

        {{ csrf_field() }}

        @component('includes.partials.forms.form_group', ['id' => 'email', 'type' => 'email', 'size' => 'lg'])
            Email

            @slot('example')
                E.g. hello@jettywrench.com
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'password', 'type' => 'password', 'size' => 'lg'])
            Password

            @slot('example')
                My secret password
            @endslot

            @slot('help_text')
                <a href="{{ route('password.request') }}" class="text-info">Forgot it?</a>
            @endslot

        @endcomponent

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Log in</button>

        <p class="text-center text-muted mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-info">Sign up</a></p>

    </form>
@endsection
