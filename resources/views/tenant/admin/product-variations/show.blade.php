@extends('layouts.dashboard')

@section('title')
    {{ $product_variation->product->name }} ({{ $product_variation->name }})
@endsection
@section('heading')
    <span class="text-muted">{{ $product_variation->product->name }} / </span>{{ $product_variation->name }}
@endsection
@section('return')
    <a href="{{ route('tenant.admin.products.show', [request()->tenant()->subdomain, $product_variation->product]) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>{{ $product_variation->product->name }}</a>
@endsection

@section('actions')
    <a href="{{ route('tenant.admin.product-variations.edit', [request()->tenant()->subdomain, $product_variation]) }}" class="btn btn-secondary">Edit variation</a>
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Print
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('tenant.admin.product-variations.labels.print', [request()->tenant()->subdomain, $product_variation, 'product']) }}" class="dropdown-item">Product label</a>
            <a href="{{ route('tenant.admin.product-variations.labels.print', [request()->tenant()->subdomain, $product_variation, 'ingredients']) }}" class="dropdown-item">Ingredients label</a>
        </div>
    </div>
@endsection

@section('dashboard.content')
    <div class="row">
        <div class="col">
            <strong>Price:</strong> {{ $product_variation->formatted_price_unit }}<br/><br/>
        </div>

        <div class="col mt-3">

            @component('includes.partials.modules._heading_section', ['id' => 'ingredients'])

                @slot('heading', 'Ingredients')

                @slot('icon', 'lemon')

                @slot('model', $product_variation->ingredients)

                @slot('create_url', route('tenant.admin.product-variations.ingredients.create', [request()->tenant()->subdomain, $product_variation]))

                @foreach($product_variation->ingredients as $ingredient)
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="d-flex align-items-center">

                                <i class="fa fa-grip-vertical pr-4 text-muted"></i>

                                <div>
                                    <a href="{{ route('tenant.admin.ingredients.show', [request()->tenant()->subdomain, $ingredient->id]) }}"><h5 class="mb-0">{{ $ingredient->name }}</h5></a><small class="text-muted">{{ $ingredient->formatted_price_unit }}</small>
                                </div>
                                <div class="ml-auto">
                                    <button class="btn text-danger btn-sm btn-link" onclick="document.getElementById('delete-ingredient-{{ $ingredient->id }}-form').submit();">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endcomponent

            @foreach($product_variation->ingredients as $ingredient)
                <form id="delete-ingredient-{{ $ingredient->id }}-form" action="{{ route('tenant.admin.product-variations.ingredients.destroy', [request()->tenant()->subdomain, $product_variation->id, $ingredient->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
            @endforeach


        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#ingredients-table').DataTable({
                "lengthChange": false,
                "searching": false,
                "pageLength": 10,
                "order" : [],
                "columns": [
                    { name: 'name', width: '70%' },
                    { name: 'price', width: '25%'},
                    { name: 'actions', width: '5%', orderable: false},
                ]
            });
        } );
    </script>
@endpush

