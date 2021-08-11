<div class="form-group @if(isset($form_element) && $form_element == 'file') custom-file @endif{{ $class ?? ''  }}">
    <label @if($errors->count() == 0 && !(isset($show_labels) && $show_labels == true)) class="d-none" @endif for="{{ kebab_case($id) }}">{{ $slot }}</label>

    @if(isset($prepend) || isset($append))
        <div class="input-group @if(!isset($append))round-right @endif">
    @endif

    @isset($prepend)
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">{{ $prepend }}</span>
        </div>
    @endif

    @isset($form_element)

        @if($form_element == 'select')
            @include('includes.partials.forms.select')
        @elseif($form_element == 'file')
            @include('includes.partials.forms.file')
        @elseif($form_element == 'input')
            @include('includes.partials.forms.input')
        @elseif($form_element == 'textarea')
            @include('includes.partials.forms.textarea')
        @endif

    @else
        @include('includes.partials.forms.input')
    @endif

    <div class="invalid-feedback order-last">
        {{ $errors->first(snake_case($id)) }}
    </div>

    @isset($append)
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">{{ $append }}</span>
        </div>
    @endif

    @if(isset($prepend) || isset($append))
    </div>
    @endif

    @isset($help_text)
        <small id="{{ kebab_case($id) }}-help" class="form-text text-muted order-last">
            {{ $help_text }}
        </small>
    @endisset



</div>

