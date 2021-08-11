@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select an attribute
    @endslot

    @slot('options', $attributes)

    Attribute

@endcomponent