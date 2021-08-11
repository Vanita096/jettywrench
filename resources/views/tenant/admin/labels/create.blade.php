@extends('layouts.dashboard')

@section('title')
    Create a label
@endsection
@section('heading')
    Create a label
@endsection

@section('dashboard.content')
    <form action="{{ route('tenant.admin.labels.generate', ['workspace' => request()->tenant()->subdomain, 'type' => $type]) }}" method="post">

        @csrf

        @component('includes.partials.forms.form_group', ['id' => 'variation_type', 'class' => 'w-50', 'show_labels' => true])
            Variation type

            @slot('example')
                E.g. Regular, Organic, or Pasture-raised
            @endslot

        @endcomponent

        @component('includes.partials.forms.form_group', ['id' => 'name', 'class' => 'w-50', 'show_labels' => true])
            Name

            @slot('example')
                E.g. Chicken cutlet
            @endslot

        @endcomponent

        @if($type == 'ingredients')

            @component('includes.partials.forms.form_group', ['id' => 'ingredients', 'class' => 'w-50', 'show_labels' => true, 'form_element' => 'textarea'])
                Ingredients

                @slot('example')
                    E.g. Salt, pepper, garlic, etc. (comma separated)
                @endslot

            @endcomponent

        @endif

        <button type="submit" class="btn btn-primary">Print</button>

    </form>
@endsection
