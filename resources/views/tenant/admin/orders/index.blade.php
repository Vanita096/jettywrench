@extends('layouts.dashboard')

@section('title', 'Orders')
@section('heading', 'Orders')

@section('actions')
    <a href="{{ route('tenant.admin.orders.create', request()->tenant()->subdomain) }}" class="btn btn-primary">Create an order</a>
@endsection

@section('dashboard.content')

    @component('includes.partials.modules._table', ['id' => 'my_table', 'columns' => ['Number', 'Name']])

        @slot('content')
            @foreach($orders as $order)
                <tr>
                    <td><a href="#{{ $order->id }}">{{ $order->id }}</a></td>
                    <td>{{ $order->name }}</td>
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
                "searching": false,
                "pageLength": 10,
                "columns": [
                    { name: 'id', width: '10%' },
                    { name: 'name', width: '90%'}
                ]
            });
        } );
    </script>
@endpush
