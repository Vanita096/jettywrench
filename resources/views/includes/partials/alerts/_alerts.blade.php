@if(Session::has('success'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'success'])
        {{ session('success') }}
    @endcomponent
@endif

@if(Session::has('error'))
    @component('layouts.partials.alerts._alerts_component', ['type' => 'danger'])
        {{ session('error') }}
    @endcomponent
@endif