<div class="row mt-5">
    <div class="col-md-5">
        <h5>{{ $title }}</h5>
        <p class="text-muted">{{ $subtitle ?? '' }}</p>
    </div>
    <div class="col-md-7">
        {{ $slot }}
    </div>
</div>