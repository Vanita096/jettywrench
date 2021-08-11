@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select a country
    @endslot

    @slot('options', $countries)

    Country

@endcomponent