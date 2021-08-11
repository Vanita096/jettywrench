<nav class="d-flex py-3 align-items-center">

    <h4 class="my-0">{{ config('app.name') }}</h4>

    <div class="ml-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center py-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="@if(auth()->user()->getMedia('avatars')->count() > 0) {{ auth()->user()->getMedia('avatars')->last()->getUrl('thumb') }} @endif" class="rounded" alt="">
                <span class="mx-3">{{ auth()->user()->name }}</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Log out</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </div>
</nav>

@if(!auth()->user()->hasVerifiedEmail())
    @if(session('resent'))
        @component('includes.partials.alerts._alerts_component', ['type' => 'success', 'heading' => 'Check your inbox'])
            We've just resent your email verification link.
        @endcomponent
    @else
        @component('includes.partials.alerts._alerts_component', ['type' => 'warning', 'heading' => 'Please verify your email address'])
            Check your inbox for a verification email. To resend it, <a href="{{ route('verification.resend') }}">click here.</a>
        @endcomponent
    @endif
@endif

@if(session('success'))
    @component('includes.partials.alerts._alerts_component', ['type' => 'success', 'heading' => session('success.title')])
        {{ session('success.message') ?? session('success') }}
    @endcomponent
@endif