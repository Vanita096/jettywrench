{{-- Authentication Template --}}
@extends('layouts.master')

@section('content')

    {{-- Header --}}
    @include('tenant.public.includes.header')

    {{-- Content --}}
    @yield('tenant.public.content')

    {{-- Footer --}}
    @include('tenant.public.includes.footer')

@endsection
