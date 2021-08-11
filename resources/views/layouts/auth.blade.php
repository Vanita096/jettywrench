{{-- Authentication Template --}}
@extends('layouts.master')
@section('content')
    <div class="container mb-2 mt-4 mt-sm-5">

        <div class="text-center mb-4">
            <a href="#" class="h3 text-dark jw-link-decoration-none"><i class="far {{ config('app.icon') }} mr-2"></i>{{ config('app.name') }}</a>
            <h2 class="pt-4 pb-2">@yield('heading')</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">

                @yield('subheading')

                @if($errors->any())
                    @component('includes.partials.alerts._alerts_component', ['type' => 'danger', 'heading' => 'Hmm, something smells fishy...'])
                        Please review the error messages below.
                    @endcomponent
                @endif

                @if(Session::has('status'))
                    @component('includes.partials.alerts._alerts_component', ['type' => 'success', 'heading' => 'Check your email inbox'])
                        We've emailed instructions to reset your password.
                    @endcomponent
                @endif

                @if(session('success'))
                    @component('includes.partials.alerts._alerts_component', ['type' => 'success', 'heading' => session('success.title')])
                        {{ session('success.message') ?? session('success') }}
                    @endcomponent
                @endif

                @yield('auth.content')

                <ul class="nav justify-content-center mt-4">
                    <li class="nav-item"><a class="nav-link text-secondary active" href="#">Help</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="#">Privacy</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="#">Terms</a></li>
                </ul>

            </div>
        </div>
    </div>
@endsection
