{{-- Dashboard Template --}}
@extends('layouts.master')
@section('content')
    <div class="row no-gutters" id="app">

        @include('includes.partials.sidebar')

        <main class="col-12 col-md-8 col-xl-8 ml-auto mr-auto px-3 px-md-0" role="main">

            @include('includes.partials.headers.admin')

            @yield('return')

            @component('includes.partials.modules._content_header')

                @yield('heading')

                @slot('actions')
                    @yield('actions')
                @endslot

            @endcomponent

            @yield('dashboard.content')

            @include('includes.partials.footer')

        </main>
    </div>
@endsection