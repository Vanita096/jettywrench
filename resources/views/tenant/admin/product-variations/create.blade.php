@extends('layouts.dashboard')

@section('title')
    Create a product variation
@endsection
@section('heading')
    Create a product variation
@endsection
@section('return')
    <a href="{{ route('tenant.admin.products.show', [request()->tenant()->subdomain, $product]) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>{{ $product->name }}</a>
@endsection

@section('dashboard.content')
    <form action="{{ route('tenant.admin.products.variations.store', [request()->tenant()->subdomain, $product]) }}" method="post">

        @csrf

        @component('includes.partials.forms.form_group', ['id' => 'type', 'class' => 'w-50', 'show_labels' => true])
            Type

            @slot('example')
                E.g. Quality, size, etc.
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'name', 'class' => 'w-50', 'show_labels' => true])
            Name

            @slot('example')
                E.g. Regular, organic, large, etc.
            @endslot

        @endcomponent

        <div class="form-row">
            @component('includes.partials.forms.form_group', ['id' => 'price', 'class' => 'col', 'show_labels' => true])
                Price

                @slot('prepend', '$')

                @slot('example')
                    E.g. {{ $product->formatted_amount + 1 }}
                @endslot

                @slot('help_text')
                    Specify price if different from base product: <strong>{{ $product->formatted_price_unit }}</strong>
                @endslot

            @endcomponent

            @component('includes.partials.forms.form_group', ['id' => 'unit', 'class' => 'col', 'show_labels' => true])
                Unit

                @slot('prepend', '/')

                @slot('example')
                    E.g. lb, oz, doz, etc.
                @endslot

            @endcomponent
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection
