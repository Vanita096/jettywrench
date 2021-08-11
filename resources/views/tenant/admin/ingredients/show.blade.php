@extends('layouts.dashboard')

@section('title', $ingredient->name)
@section('heading', $ingredient->name)
@section('return')
    <a href="{{ route('tenant.admin.ingredients.index', request()->tenant()->subdomain) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Products</a>
@endsection

@section('actions')
    <a href="{{ route('tenant.admin.ingredients.edit', [request()->tenant()->subdomain, $ingredient]) }}" class="btn btn-secondary">Edit ingredient</a>
@endsection

@section('dashboard.content')
    <div class="row">
        <div class="col">
            <strong>Price:</strong> {{ $ingredient->formatted_price }}<br/>
            <strong>Unit:</strong> {{ $ingredient->unit }}
        </div>
        <div class="col">

        </div>
    </div>
@endsection
