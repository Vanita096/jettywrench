@extends('layouts.dashboard')

@section('title', 'Create a product')
@section('heading', 'Create a product')

@section('dashboard.content')
    <form action="{{ route('tenant.admin.products.store', request()->tenant()->subdomain) }}" method="post" enctype="multipart/form-data">

        @csrf

        @component('includes.partials.forms.form_group', ['id' => 'name', 'class' => 'w-50', 'show_labels' => true])
            Name

            @slot('example')
                E.g. Chicken breast
            @endslot

        @endcomponent

        <div class="form-row">
            @component('includes.partials.forms.form_group', ['id' => 'price', 'class' => 'col', 'show_labels' => true])
                Price

                @slot('prepend')
                    $
                @endslot

                @slot('example')
                    E.g. 10.99
                @endslot

            @endcomponent

                @component('includes.partials.forms.form_group', ['id' => 'unit', 'class' => 'col', 'show_labels' => true])
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

    </form>
@endsection
