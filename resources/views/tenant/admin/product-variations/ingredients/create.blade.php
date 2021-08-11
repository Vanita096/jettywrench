@extends('layouts.dashboard')

@section('title')
    Add an ingredient
@endsection
@section('heading')
    Add an ingredient
@endsection
@section('return')
    <a href="{{ route('tenant.admin.product-variations.show', [request()->tenant()->subdomain, $product_variation]) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>{{ $product_variation->name }}</a>
@endsection

@section('dashboard.content')
    <form action="{{ route('tenant.admin.product-variations.ingredients.store', [request()->tenant()->subdomain, $product_variation]) }}" method="post">

        @csrf

        @component('includes.partials.forms.form_group', ['id' => 'ingredient_id', 'form_element' => 'select', 'show_labels' => true])
            Ingredient

            @slot('placeholder', 'Select an ingredient')

            @slot('options', $ingredients)

        @endcomponent

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection
