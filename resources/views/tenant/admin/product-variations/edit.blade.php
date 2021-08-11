@extends('layouts.dashboard')

@section('title')
    Edit {{ $product_variation->product->name }} ({{ $product_variation->name }})
@endsection
@section('heading')
    <span class="text-muted">{{ $product_variation->product->name }} / {{ $product_variation->name }} / </span> Edit
@endsection
@section('return')
    <a href="{{ route('tenant.admin.product-variations.show', [request()->tenant()->subdomain, $product_variation]) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>{{ $product_variation->product->name }} ({{ $product_variation->name }})</a>
@endsection

@section('dashboard.content')
    <form action="{{ route('tenant.admin.product-variations.update', [request()->tenant()->subdomain, $product_variation]) }}" method="post">

        @csrf
        @method('PUT')

        @component('includes.partials.forms.form_group', ['id' => 'type', 'class' => 'w-50', 'show_labels' => true, 'value' => $product_variation->type->name])
            Type

            @slot('example')
                E.g. Quality, package, etc.
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'name', 'class' => 'w-50', 'value' => $product_variation->name, 'show_labels' => true])
            Name

            @slot('example')
                E.g. Regular, Organic, or Pasture-raised
            @endslot

        @endcomponent

        <div class="form-row">

            @component('includes.partials.forms.form_group', ['id' => 'price', 'class' => 'col', 'value' => $product_variation->formatted_amount, 'show_labels' => true])
                Price

                @slot('prepend')
                    $
                @endslot

                @slot('example')
                    E.g. $10.99
                @endslot

            @endcomponent

            @component('includes.partials.forms.form_group', ['id' => 'unit', 'class' => 'col', 'value' => $product_variation->unit, 'show_labels' => true])

                @slot('prepend')
                    /
                @endslot

                Unit

                @slot('example')
                    E.g. lb, oz, doz, etc.
                @endslot

            @endcomponent

        </div>


        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection
