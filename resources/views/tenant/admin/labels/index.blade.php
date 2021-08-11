@extends('layouts.dashboard')

@section('title', 'Labels')
@section('heading', 'Labels')

@section('dashboard.content')

    @component('includes.partials.modules._table', ['id' => 'my_table', 'columns' => ['Name']])

        @slot('content')

                <tr>
                    <td><a href="/documents/letterhead.pdf">Letterhead</a></td>
                </tr>
                <tr>
                    <td><a href="/documents/thank_you.pdf">Thank you label</a></td>
                </tr>
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
                    { name: 'name', width: '100%' },
                ]
            });
        } );
    </script>
@endpush
