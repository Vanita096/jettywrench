<nav class="d-flex">
	<span class="navbar-text">
		<button class="navbar-toggler px-0 pt-2" type="button" data-toggle="collapse" data-target="#jw-dashboard-sidebar" aria-controls="#jw-dashboard-sidebar" aria-expanded="true" aria-label="Toggle menu">
		    <i class="far fa-bars"></i>
		</button>
	</span>

	<ul class="nav ml-auto py-2">
		
		<li class="nav-item">
			<a class="nav-link text-secondary" data-toggle="tooltip" data-placement="bottom" title="Search" href="#"><i class="far fa-search"></i></a>
		</li>

		<li class="nav-item">
	    	<a class="nav-link text-secondary" data-toggle="tooltip" data-placement="bottom" title="Concierge" href="#"><i class="fas fa-concierge-bell"></i></a>
	  	</li>

	</ul>
</nav>

@if(session('success'))
	@component('includes.partials.alerts._alerts_component', ['type' => 'success', 'heading' => session('success.title')])
		{{ session('success.message') ?? session('success') }}
	@endcomponent
@endif