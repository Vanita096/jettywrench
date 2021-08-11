@extends('layouts.auth')

@section('title', 'Sign up')
@section('heading')
    Try us out &mdash; we don't bite!
@endsection

@section('subheading')
    {{-- <i class="far fa-fish pt-3 text-secondary"></i> --}}
@endsection

@section('auth.content')
    @include('auth.register.form', ['size' => 'lg'])
@endsection
