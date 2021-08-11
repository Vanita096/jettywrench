@extends('layouts.dashboard')

@section('title', 'Create an order')
@section('heading', 'Create an order')

@section('dashboard.content')
    <form action="{{ route('tenant.admin.orders.store', request()->tenant()->subdomain) }}" method="post">

        @csrf

        @component('includes.partials.forms.form_group', ['id' => 'name', 'class' => 'w-50'])
            Order Name

            @slot('example')
                E.g. New York City Department of Parks &amp; Recreation
            @endslot

        @endcomponent

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection
