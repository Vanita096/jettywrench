@extends('layouts.dashboard')

@section('title')
    Create a package
@endsection
@section('heading')
    Create a package
@endsection
@section('return')
    <a href="{{ route('tenant.admin.products.show', [request()->tenant()->subdomain, $product]) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>{{ $product->name }}</a>
@endsection

@section('dashboard.content')
    <form action="{{ route('tenant.admin.products.packages.store', [request()->tenant()->subdomain, $product]) }}" method="post">

        @csrf

            @component('includes.partials.forms.form_group', ['id' => 'quantity', 'class' => 'w-50', 'show_labels' => true, 'autofocus' => true])
                Quantity

                @slot('append')
                    pieces
                @endslot

            @endcomponent



            @component('includes.partials.forms.form_group', ['id' => 'amount', 'class' => 'w-50', 'show_labels' => true, 'value' => 1])
                Amount

                @slot('append')
                    {{ $product->name }}
                @endslot



            @endcomponent



        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection
