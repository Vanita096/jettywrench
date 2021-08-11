<div class="card jw-map pb-0">
    <div id="{{ $id ?? 'map-01'}}" class="jw-map-container rounded" style="overflow:hidden; height:{{ $height ?? '200px' }}">
        {{-- <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-73.89003306627275%2C40.724638639815296%2C-73.88649255037309%2C40.72657173076329&amp;layer=mapnik&amp;marker=40.72560338194076%2C-73.88826294452883"></iframe> --}}

    </div>
</div>

@push('stylesheets')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
     integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
     crossorigin=""/>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
   integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
   crossorigin=""></script>

<script type="text/javascript">

	// initialize the map
	var map = L.map('map-01');

@isset($markers)
	var markers = [
		@foreach($markers as $marker)
			[{{ $marker['latitude']}}, {{ $marker['longitude']}}],
		@endforeach
	]

	var bounds = L.latLngBounds([markers]).pad(0.10);

	// ensure that all points are in view
	map.fitBounds(bounds, {
		maxZoom: 16
	});

	// add the markers to the map
@foreach($markers as $marker)

	var myIcon = L.icon({
	    iconUrl: '/img/current.png',
	    iconSize: [40, 40],
	    iconAnchor: [20, 20],
	    popupAnchor: [-3, -76]
	});

	@if($marker['type'] == 'current')
		L.marker([{{ $marker['latitude']}}, {{ $marker['longitude']}}], { icon: myIcon }).addTo(map);
	@elseif($marker['type'] == 'end' || $marker['type'] == 'start' || $marker['type'] == 'location')
		L.marker([{{ $marker['latitude']}}, {{ $marker['longitude']}}]).addTo(map);
	@endif
@endforeach

@endisset

@isset($route)
	var route_latlngs = [
		@foreach($route as $point)
			[{{ $point['latitude'] }}, {{ $point['longitude'] }}],
		@endforeach
	]

	// add route points to group
	var route = L.layerGroup([
		L.polyline(route_latlngs, {color: 'darkblue'})
	]);

	map.addLayer(route);
@endisset
	

	L.tileLayer('https://api.mapbox.com/v4/mapbox.streets-basic/{z}/{x}/{y}@2x.png?access_token=pk.eyJ1IjoiZGFuaWVsc3oiLCJhIjoiY2piMTEyamFqMXd0bDMzcWtsbHlkenV2dyJ9.uGuuHovA8T8M_bp6Dw28nQ', {
	    maxZoom: 19
	}).addTo(map);


</script>

@endpush