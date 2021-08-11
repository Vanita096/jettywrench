<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">{{ request()->tenant()->name }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="{{ route('tenant.public.home', request()->tenant()->subdomain) }}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{ route('tenant.public.about', request()->tenant()->subdomain) }}">About</a>
                <a class="nav-item nav-link" href="{{ route('tenant.public.contact', request()->tenant()->subdomain) }}">Contact</a>
            </div>
        </div>
    </div>
</nav>