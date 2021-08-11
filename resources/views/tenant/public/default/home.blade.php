@extends('layouts.tenant')

@section('title', 'Homepage')

@section('tenant.public.content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">
                    Home
                </h1>
                <p>Welcome to the default homepage of <strong>{{ request()->tenant()->name }}</strong></p>
            </div>
        </div>
    </div>
@endsection