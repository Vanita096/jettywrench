@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('actions')
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Create New
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('tenant.admin.orders.create', request()->tenant()->subdomain) }}" class="dropdown-item">Order</a>
            <a href="{{ route('tenant.admin.products.create', request()->tenant()->subdomain) }}" class="dropdown-item">Product</a>
        </div>
    </div>
@endsection

@section('dashboard.content')

@endsection
