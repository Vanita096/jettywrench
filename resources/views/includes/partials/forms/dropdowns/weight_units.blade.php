@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select a weight unit
    @endslot

    @slot('options', $weight_units)

    Weight unit

@endcomponent