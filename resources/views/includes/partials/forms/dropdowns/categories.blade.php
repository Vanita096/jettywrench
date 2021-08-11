@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select a category
    @endslot

    @slot('tree', $categories)

    Category

@endcomponent