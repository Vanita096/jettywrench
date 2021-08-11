<input type="file" class="custom-file-input {{ $errors->has(snake_case($id)) ? 'is-invalid' : '' }}" id="{{ kebab_case($id) }}" name="{{ snake_case($id) }}">
<label class="custom-file-label" for="{{ kebab_case($id) }}">{{ $placeholder ?? 'Choose a file'}}</label>

@push('scripts')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            if (!fileName) {
                fileName = '{{ $placeholder ?? 'Choose a file' }}';
            }
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
@endpush