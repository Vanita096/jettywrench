<div id="jw-dashboard-sidebar" class="col-12 col-md-3 col-xl-2 jw-sidebar collapse show" style="overflow:visible; z-index: 100;">

    <div id="top-action" class="dropright">
        <a class="nav-link py-3 dropdown-toggle d-flex align-items-center" href="#" data-toggle="dropdown" data-flip="false" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
            <i class="far {{ config('tenant.icon') }} fa-fw mr-3"></i>
            <span class="text-truncate flex-grow-1"> {{ optional(request()->tenant())->name ?: config('app.name') }}</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <h2 class="dropdown-header py-2">Organizations</h2>

            @if($organizations->count())
                @foreach($organizations as $organization)
                    <a class="dropdown-item py-2 d-flex justify-content-between" href="{{ route('tenant.admin.dashboard',$organization->subdomain) }}">{{ $organization->name }}
                        @if(request()->tenant($organization->uuid))<i class="far fa-check fa-fw ml-2 text-success"></i>@endif
                    </a>
                @endforeach
            @endif

            <a class="dropdown-item py-2 text-primary" href="{{ route('account.organizations.create') }}">Create a new organization</a>
            <div class="dropdown-divider"></div>
            <p class="px-4 mb-3">You are signed in as <strong>{{ auth()->user()->email }}</strong><br/><small class="text-muted">@if (auth()->user()->isAn('admin')) Administrator @endif</small></p>
            <a class="dropdown-item py-2 d-flex align-items-center" href="{{ route('account.index') }}"><i class="far fa-user-cog fa-fw mr-1"></i> Manage Profile</a>
            <a class="dropdown-item py-2 d-flex align-items-center" href="{{ route('logout', request()->tenant()->subdomain) }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="far fa-sign-out fa-fw mr-1"></i> Log out</a>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout', request()->tenant()->subdomain) }}" method="POST" class="d-none">@csrf</form>

    <ul class="nav flex-column mt-1">
        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{ route('tenant.admin.dashboard', request()->tenant()->subdomain) }}">
                <i class="far fa-home fa-fw mr-3"></i>Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{ route('tenant.admin.orders.index', request()->tenant()->subdomain) }}">
                <i class="far fa-inbox-in fa-fw mr-3"></i>Orders
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{ route('tenant.admin.ingredients.index', request()->tenant()->subdomain) }}">
                <i class="far fa-lemon fa-fw mr-3"></i>Ingredients
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{ route('tenant.admin.products.index', request()->tenant()->subdomain) }}">
                <i class="far fa-shopping-basket fa-fw mr-3"></i>Products
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{ route('tenant.admin.labels.index', request()->tenant()->subdomain) }}">
                <i class="far fa-tags fa-fw mr-3"></i>Labels
            </a>

            <ul>

                <li class="nav-item list-unstyled ml-3">
                    <a class="nav-link text-truncate" href="{{ route('tenant.admin.labels.create', ['workspace' => request()->tenant()->subdomain, 'type' => 'product']) }}">
                        Products
                    </a>
                </li>

                <li class="nav-item list-unstyled ml-3">
                    <a class="nav-link text-truncate" href="{{ route('tenant.admin.labels.create', ['workspace' => request()->tenant()->subdomain, 'type' => 'ingredients']) }}">
                        Ingredients
                    </a>
                </li>

            </ul>

        </li>

        <hr>

        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{ route('tenant.admin.settings.index', request()->tenant()->subdomain) }}">
                <i class="far fa-cog fa-fw mr-3"></i>Settings
            </a>
        </li>

    </ul>

</div>