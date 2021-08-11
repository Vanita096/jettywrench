@extends('layouts.dashboard')

@section('title', 'Create an ingredient')
@section('heading', 'Create an ingredient')

@section('dashboard.content')
    <form action="{{ route('tenant.admin.ingredients.store', request()->tenant()->subdomain) }}" method="post">

        @csrf

        @component('includes.partials.forms.form_group', ['id' => 'name', 'class' => 'w-50', 'show_labels' => true])
            Name

            @slot('example')
                E.g. Egg
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'price', 'class' => 'w-50', 'show_labels' => true])
            Price

            @slot('prepend')
                $
            @endslot

            @slot('example')
                E.g. 10.99
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'unit', 'class' => 'w-50', 'show_labels' => true])
            Unit

            @slot('example')
                E.g. lb, oz, doz, etc.
            @endslot

        @endcomponent

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection
