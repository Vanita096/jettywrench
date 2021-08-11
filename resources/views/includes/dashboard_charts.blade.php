@component('includes.partials.modules._tabs', ['items' => ['Total orders', 'User logins']])

	@slot('total_orders')

		<div class="row">
			<div class="col-md-6">
				left
			</div>
			<div class="col-md-6">
				right
			</div>
		</div>

	@endslot


@endcomponent