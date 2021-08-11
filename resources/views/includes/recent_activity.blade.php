<h3>Activity</h3>

@component('layouts.partials.modules._notification', ['type' => 'secondary', 'time' => '4 minutes ago'])

	@slot('title')
		Order <a href="#">123</a> is ready for pick up
	@endslot

 	<ul class="list-unstyled">
		<li><i class="far fa-fw fa-clock mr-1"></i>10:00 am</li>
		<li><i class="far fa-fw fa-person-carry mr-1"></i><a href="#">Daniel Szewczyk</a></li>
	</ul>

@endcomponent

@component('layouts.partials.modules._notification', ['type' => 'success', 'time' => '40 minutes ago'])

	@slot('title')
		Order <a href="#">#6578129</a> has been placed
	@endslot

	<ul class="list-unstyled">
		<li>
			<i class="far fa-fw fa-user mr-1"></i><a href="#">Matthew Thomasz</a>
		</li>

 		<li class="d-flex justify-content-between">
			<span>
				<i class="far fa-fw fa-person-carry mr-1"></i>Pick-up	
			</span>
			<span>
				<i class="far fa-fw fa-calendar-alt mr-1"></i>Jul 24
			</span>
			<span>
				<i class="far fa-fw fa-clock mr-1"></i>2:15 pm
			</span>

 		</li>
 	</ul>

@endcomponent