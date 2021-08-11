@component('layouts.partials.forms.form_group', $options)

    @slot('form_element', 'select')

    @slot('example')
        Select an order status type
    @endslot

    @slot('options', $order_status_types)

    Order status type

@endcomponent