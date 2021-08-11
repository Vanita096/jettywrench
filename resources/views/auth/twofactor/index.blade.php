@extends('layouts.auth')

@section('title', 'Two-step verification')
@section('heading', 'Two-step verification')

@section('auth.content')
    <form action="{{ route('login.twofactor.verify') }}" method="post">

        {{ csrf_field() }}

        @component('includes.partials.forms.form_group', ['id' => 'token', 'mask' => '000 000', 'size' => 'lg', 'autofocus' => true])
            Security code

            @slot('example')
                E.g. 000 000
            @endslot

        @endcomponent

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Log in</button>

        <p class="text-center text-muted mt-4">Didn't receive a code? <a href="{{ route('login.twofactor.resend') }}" class="text-info">Resend</a></p>

    </form>
@endsection
