@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select an email type
    @endslot

    @slot('options', $email_address_types)

    Email type

@endcomponent