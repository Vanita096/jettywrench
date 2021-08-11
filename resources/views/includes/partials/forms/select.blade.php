<select id="{{ kebab_case($id) }}" name="{{ snake_case($id) }}" class="form-control custom-select @isset($size)form-control-{{ $size }}@endisset {{ $errors->has(snake_case($id)) ? 'is-invalid' : '' }}">

    <option disabled @if(!old(snake_case($id))) selected @endif>{{ $placeholder ?? $slot }}</option>

    @isset($options)
    @foreach($options as $label => $value)
        <option @if(old(snake_case($id)) == $value) selected @elseif(!old(snake_case($id)) && isset($selected) && $selected == $value)selected @endif value="{{ $value  }}">{{ $label }}</option>
    @endforeach
    @endisset

    @isset($tree)
        @foreach($tree as $branch)
            <optgroup label="{{ $branch->name }}">
                @foreach($branch->children as $child)
                    <option @if(old(snake_case($id)) == $child->name) selected @elseif(!old(snake_case($id)) && isset($selected) && $selected == $child->id)selected @endif value="{{ $child->id  }}">{{ $child->name }}</option>
                @endforeach
            </optgroup>
        @endforeach
    @endisset

</select>
