@extends('layouts.dashboard')

@section('title', 'Edit a product')
@section('heading', 'Edit a product')

@section('return')
    <a href="{{ route('tenant.admin.products.show', [request()->tenant()->subdomain, $product]) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>{{ $product->name }}</a>
@endsection

@section('dashboard.content')
    <form action="{{ route('tenant.admin.products.update', [request()->tenant()->subdomain, $product]) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @component('includes.partials.forms.form_group', ['id' => 'name', 'class' => 'w-50', 'show_labels' => true, 'value' => $product->name])
            Name

            @slot('example')
                E.g. Chicken breast
            @endslot

        @endcomponent

        <div class="form-row">

            @component('includes.partials.forms.form_group', ['id' => 'price', 'class' => 'col', 'show_labels' => true, 'value' => $product->formatted_amount])
                Price

                @slot('prepend')
                    $
                @endslot

                @slot('example')
                    E.g. 10.99
                @endslot

            @endcomponent

            @component('includes.partials.forms.form_group', ['id' => 'unit', 'class' => 'col', 'show_labels' => true, 'value' => $product->unit])
                Unit

                @slot('prepend')
                    /
                @endslot

                @slot('example')
                    E.g. lb, oz, doz, etc.
                @endslot

            @endcomponent

        </div>

        <button type="submit" class="btn btn-primary">Save</button>

        <hr>

    </form>

    <form id="delete-product-{{ $product->id }}-form" action="{{ route('tenant.admin.products.destroy', [request()->tenant()->subdomain, $product]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete product</button>
    </form>
@endsection
