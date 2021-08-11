@extends('layouts.dashboard')

@section('title', 'Ingredients')
@section('heading', 'Ingredients')

@section('actions')
    <a href="{{ route('tenant.admin.ingredients.create', request()->tenant()->subdomain) }}" class="btn btn-primary">Create an ingredient</a>
@endsection

@section('dashboard.content')

    @component('includes.partials.modules._table', ['id' => 'ingredients-table', 'columns' => ['Name', 'Price']])

        @slot('content')
            @foreach($ingredients as $ingredient)
                <tr>
                    <td><a href="{{ route('tenant.admin.ingredients.show', [request()->tenant()->subdomain, $ingredient->id]) }}">{{ $ingredient->name }}</a></td>
                    <td>@isset($ingredient->formatted_price) {{ $ingredient->formatted_price_unit }} @else <span class="text-muted">&mdash;</span> @endisset</td>
                </tr>
            @endforeach
        @endslot

    @endcomponent
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#ingredients-table').DataTable({
                "lengthChange": false,
                "searching": true,
                "pageLength": 10,
                "order": [[0, "asc"]],
                "columns": [
                    { name: 'name', width: '60%'},
                    { name: 'price', width: '20%'}
                ]
            });
        } );
    </script>
@endpush
