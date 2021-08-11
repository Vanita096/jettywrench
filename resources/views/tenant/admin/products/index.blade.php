@extends('layouts.dashboard')

@section('title', 'Products')
@section('heading', 'Products')

@section('actions')
    <a href="{{ route('tenant.admin.products.create', request()->tenant()->subdomain) }}" class="btn btn-primary">Create a product</a>
@endsection

@section('dashboard.content')

    @component('includes.partials.modules._table', ['id' => 'my_table', 'columns' => ['Name', 'Variations', 'Price']])

        @slot('content')
            @foreach($products as $product)
                <tr>
                    <td><a href="{{ route('tenant.admin.products.show', [request()->tenant()->subdomain, $product->id]) }}">{{ $product->name }}</a></td>
                    <td>@forelse($product->variations as $variation) <a href="{{ route('tenant.admin.product-variations.show', [request()->tenant()->subdomain, $variation->id]) }}">{{ $variation->name }}</a>@if(!$loop->last),@endif @empty none @endforelse</td>
                    <td>{{ $product->formatted_price_unit }}</td>
                </tr>
            @endforeach
        @endslot

    @endcomponent
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#my_table').DataTable({
                "lengthChange": false,
                "searching": true,
                "pageLength": 10,
                "order": [],
                "columns": [
                    { name: 'id', width: '50%' },
                    { name: 'name', width: '30%'},
                    { name: 'price', width: '20%'}
                ]
            });
        } );
    </script>
@endpush
