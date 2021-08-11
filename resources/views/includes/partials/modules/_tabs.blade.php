{{-- Tabs Component --}}

{{-- Example Usage --}}

{{-- 
@component('layouts.partials.modules._tabs', ['items' => ['Total orders', 'User logins']])

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

	@slot('user_logins')
		test - 2
	@endslot

@endcomponent
 --}}

<div class="card">
	<div id="module-tabs" class="card-body">
		<div class="tab-content" id="dashbaord-tab-content">
		
		@foreach($items as $item)

			<div class="tab-pane fade @if($loop->first) show active @endif" id="{{ kebab_case($item) }}-tab-content" role="tabpanel" aria-labelledby="{{ kebab_case($item) }}-tab">
				@isset(${snake_case($item)})
				{{ ${snake_case($item)} }}
				@else
					<div class="text-center text-muted small mt-3">
						There isn't any data to show
						<p class="mt-4"><i class="far fa-umbrella-beach"></i></p>
					</div>
				@endisset
			</div>

		@endforeach
			
		</div>
	</div>
				
	<div class="card-footer">
		<ul class="nav nav-tabs card-footer-tabs small" role="tablist">
			@foreach($items as $item)
				<li class="nav-item">
					<a id="{{ kebab_case($item) }}-tab" class="nav-link @if($loop->first) active @endif" href="#{{ kebab_case($item) }}-tab-content" data-toggle="tab" role="tab" aria-controls="{{ kebab_case($item) }}-tab-content" aria-selected="true">{{ $item }}</a>
				</li>
			@endforeach
		</ul>
	</div>

</div>