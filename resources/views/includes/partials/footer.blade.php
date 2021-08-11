{{-- TODO: Dynamic breadcrumbs --}}
@component('includes.partials.modules._breadcrumbs', [
	'items' => [
		['title' => request()->tenant()->name, 'href' => route('tenant.public.home', request()->tenant()->subdomain)],
		['title' => 'Dashboard']
	]
])
@endcomponent

<div class="text-center my-4 jw-credit">
	<p class="small mb-2 text-muted">Powered by</p>
	<a href="{{ url(config('app.url')) }}" target="_blank" class="btn btn-outline-secondary btn-sm">
		<i class="far {{ config('app.icon') }} mr-1"></i> {{ config('app.name') }}
	</a>
</div>