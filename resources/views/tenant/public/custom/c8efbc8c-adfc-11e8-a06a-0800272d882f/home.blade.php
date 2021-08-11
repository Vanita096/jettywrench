@extends('layouts.tenant')

@section('title', 'Homepage')

@section('tenant.public.content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <h1 class="card-title">
                            Home
                        </h1>
                        <p>Welcome to the custom homepage of <strong>{{ request()->tenant()->name }}</strong></p>
                        <pre>{{ request()->tenant()->uuid_text }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection