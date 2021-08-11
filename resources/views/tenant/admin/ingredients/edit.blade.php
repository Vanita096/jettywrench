@extends('layouts.dashboard')

@section('title', 'Edit an ingredient')
@section('heading', 'Edit an ingredient')

@section('return')
    <a href="{{ route('tenant.admin.ingredients.show', [request()->tenant()->subdomain, $ingredient]) }}" class="text-muted"><i class="fa fa-chevron-left pr-2"></i>{{ $ingredient->name }}</a>
@endsection

@section('dashboard.content')
    <form action="{{ route('tenant.admin.ingredients.update', [request()->tenant()->subdomain, $ingredient]) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @component('includes.partials.forms.form_group', ['id' => 'name', 'class' => 'w-50', 'show_labels' => true, 'value' => $ingredient->name])
            Name

            @slot('example')
                E.g. Egg
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'price', 'class' => 'w-50', 'show_labels' => true, 'value' => $ingredient->formatted_amount])
            Price

            @slot('prepend')
                $
            @endslot

            @slot('example')
                E.g. 10.99
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'unit', 'class' => 'w-50', 'show_labels' => true, 'value' => $ingredient->unit])
            Unit

            @slot('example')
                E.g. lb, oz, doz, etc.
            @endslot

        @endcomponent

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

    <hr>

    <form id="delete-ingredient-{{ $ingredient->id }}-form" action="{{ route('tenant.admin.ingredients.destroy', [request()->tenant()->subdomain, $ingredient]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete ingredient</button>
    </form>
@endsection
