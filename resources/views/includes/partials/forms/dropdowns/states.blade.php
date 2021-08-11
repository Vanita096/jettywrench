@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select a state
    @endslot

    @slot('options', $states)

    State

@endcomponent