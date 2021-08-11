<div class="card jw-card- mb-3">
    <div class="card-body">
        <div class="row">

            <div class="col-md-4">
                <h5 class="pb-0">{{ $slot }}</h5>
                <p class="small text-muted"><a href="#" class="text-info">Edit</a> &bull; <a href="#" class="text-info">View profile</a></p>
            </div>

            <div class="col-md-4">
                <dl class="row mb-0">
                    <dt class="col-xl-4 pt-1 text-xl-right">Start</dt>
                    <dd class="col-xl-8">
                        <a href="#" class="btn btn-sm btn-outline-info">
                            <i class="far fa-fw fa-calendar-alt mr-1"></i>{{ $start }}
                        </a>
                    </dd>
                    
                    <dt class="col-xl-4 pt-1 text-xl-right">End</dt>
                    <dd class="col-xl-8">
                        <a href="#" class="btn btn-sm btn-outline-info">
                            <i class="far fa-fw fa-calendar-alt mr-1"></i>{{ $end}}
                        </a>
                    </dd>
                    @isset($hours['travel']['via'])
                    <dt class="col-xl-4 pt-1 text-xl-right">Via</dt>
                    <dd class="col-xl-8">
                        <a href="#" class="btn btn-sm btn-outline-dark">
                            <i class="far fa-fw fa-{{ $hours['travel']['via']['icon'] }} mr-2"></i>{{ $hours['travel']['via']['name'] }}
                        </a>
                    </dd>
                    @endisset

                </dl>
            </div>

            <div class="col-md-4 d-flex flex-column">
                    
                    <dl class="row mb-0">
                        <dt class="col-xl-5 pt-1 text-muted">Regular</dt>
                        <dd class="col-xl-7 pt-1 text-muted">{{ $hours['regular'] }}</dd>
                        @isset($hours['overtime'])
                        <dt class="col-xl-5 text-muted">Overtime</dt>
                        <dd class="col-xl-7 text-muted">{{ $hours['overtime'] }}</dd>
                        @endisset
                        @isset($hours['doubletime'])
                        <dt class="col-xl-5 text-muted">Double-time</dt>
                        <dd class="col-xl-7 text-muted">{{ $hours['doubletime'] }}</dd>
                        @endisset
                        @isset($hours['travel'])
                        <dt class="col-xl-5 text-muted">Travel</dt>
                        <dd class="col-xl-7 text-muted">
                            <div class="d-flex">
                                <span>{{ $hours['travel']['time'] }}</span>
                                <a href="#" class="ml-auto text-secondary" data-toggle="tooltip" data-placement="top" title="View route">
                                    <i class="far fa-route"></i>
                                </a>
                            </div>
                            <div class="small mb-0">{{ $hours['travel']['distance'] }}</div>
                        </dd>
                        @endisset
                    </dl>

                    <dl class="row mb-0 mt-auto">
                        <dt class="col-xl-5 h5 mt-auto">Total</dt>
                        <dd class="col-xl-7 h5">{{ $hours['total'] }}</dd>
                    </dl>
                    </dl>
                

                

            </div>
        </div>
    </div>
</div>