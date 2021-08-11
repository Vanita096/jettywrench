<div class="heading-section mb-4">
    <div class="d-flex justify-content-between align-items-center mb-1">
        <div>
            <h3>
                <a class="text-dark" data-toggle="collapse" href="#{{ $id }}-content">

                    <i class="fal fa-xs fa-fw fa-{{ isset($icon) ? $icon : '' }} mr-3"></i>{{ isset($model) && ($model->count() > 0) ? $model->count().' '  : ''}}{{ str_plural(str_singular($heading), isset($model) ? $model->count() : 0 ) }}
                </a>
            </h3>
        </div>
        @if( !isset($model))
        <a data-toggle="collapse" data-collapsed-text="Show" data-expanded-text="Hide" class="jw-collapse-toggle text-muted" href="#{{ $id }}-content"></a>
        @else
            <a href="{{ isset($create_url) ? $create_url : '' }}" class="btn btn-sm btn-text">Add {{ str_singular( strtolower($heading)) }}</a>
        @endif
    </div>

    <div id="{{ $id }}-content" class="jw-remove-collapse-animation collapse {{ isset($model) && $model->count() == 0 ? '' : 'show' }}">
        {{ $slot }}

        @if( isset($model) && $model->count() == 0)
            <p class="small text-center">No {{ str_plural(strtolower($heading)) }} to show</p>
        @endif

    </div>
</div>  
