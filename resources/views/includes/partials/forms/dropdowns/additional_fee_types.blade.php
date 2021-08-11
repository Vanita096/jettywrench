@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select an additional fee
    @endslot

    @slot('options', $additional_fee_types)

    Additional fee

@endcomponent