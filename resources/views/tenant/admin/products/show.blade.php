@extends('layouts.dashboard')

@section('title', $product->name)
@section('heading')
{{ $product->name }}
@endsection



@section('return')
    <a href="{{ route('tenant.admin.products.index', request()->tenant()->subdomain) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>Products</a>
@endsection

@section('actions')
    <a href="{{ route('tenant.admin.products.edit', [request()->tenant()->subdomain, $product]) }}" class="btn btn-primary">Edit product</a>
@endsection

@section('dashboard.content')
    <div class="row">
        <div class="col-md-6 pt-3">
            <div class="card">
                <img class="card-img-top" src="https://placehold.it/100x100" alt="Card image cap">
                <div class="card-table">

                    @component('includes.partials.modules._table', ['id' => 'details'])
                        <tr>
                            <td>Price:</td>
                            <td>{{ $product->formatted_price_unit }}</td>
                        </tr>
                        <tr>
                            <td>Created at:</td>
                            <td>{{ $product->created_at }}</td>
                        </tr>
                    @endcomponent

                </div>
            </div>
        </div>

        <div class="col-md-6 pt-3">

            @component('includes.partials.modules._heading_section', ['id' => 'variations'])

                @slot('icon', 'layer-group')

                @slot('heading', 'Variation')

                @slot('create_url', route('tenant.admin.products.variations.create', [request()->tenant()->subdomain, $product]))

                @slot('model', $product_variations)

                @foreach($product_variations as $product_variation)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">

                                <i class="fa fa-grip-vertical pr-4 text-dark"></i>

                                <div>
                                    <a href="{{ route('tenant.admin.product-variations.show', [request()->tenant()->subdomain, $product_variation]) }}"><h5 class="mb-0">{{ $product_variation->type->name }}: {{ $product_variation->name }}</h5></a><small class="text-muted">{{ $product_variation->formatted_price_unit }}</small>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-sm btn-link" onclick="document.getElementById('delete-product-variation-{{ $product_variation->id }}-form').submit();"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach($product_variations as $product_variation)
                    <form id="delete-product-variation-{{ $product_variation->id }}-form" action="{{ route('tenant.admin.product-variations.destroy', [request()->tenant()->subdomain, $product_variation]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                @endforeach

            @endcomponent


            @component('includes.partials.modules._heading_section', ['id' => 'packages'])

                @slot('icon', 'box-open')

                @slot('heading', 'Package')

                @slot('create_url', route('tenant.admin.products.packages.create', [request()->tenant()->subdomain, $product]))

                @slot('model', $product->packages)

                @foreach($product->packages as $package)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-grip-vertical pr-4 text-dark"></i>
                                <div>
                                    <h5 class="mb-0">{{ number_format($package->quantity, 0) }} {{ str_plural('piece', $package->quantity) }} <i class="fa fa-sm fa-times text-muted px-2"></i> {{ $package->amount }} {{ $product->name }}</h5><small class="text-muted">{{ $package->amount * $package->quantity }} {{ $product->name }}</small>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn btn-sm btn-link" onclick="document.getElementById('delete-package-{{ $package->id }}-form').submit();"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                    @foreach($product->packages as $package)
                        <form id="delete-package-{{ $package->id }}-form" action="{{ route('tenant.admin.products.packages.destroy', [request()->tenant()->subdomain, $product, $package]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endforeach

            @endcomponent

        </div>


    </div>
@endsection
