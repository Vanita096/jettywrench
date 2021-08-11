@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select a type
    @endslot

    @slot('options', $phone_number_types)

    Type

@endcomponent