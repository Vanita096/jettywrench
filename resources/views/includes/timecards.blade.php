@component('includes.partials.modules._heading_section', ['id' => 'timecards'])

    @slot('heading')
        {{ $title }}<span class="badge badge-pill badge-secondary ml-2">{{ count($items) }}</span>
    @endslot

    @slot('content')
        <div id="timecards-content" class="jw-remove-collapse-animation collapse show">
            @foreach($items as $item)
            
            @component('includes.partials.modules._timecard', $item)
                {{ $item['name'] }}

                @slot('item_type', 'technician')

            @endcomponent        

            @endforeach
        </div>
    @endslot

@endcomponent
