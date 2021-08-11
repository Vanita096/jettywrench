@isset($heading)
<h3>{{ $heading }}</h3>
@endisset

<div class="table-responsive">
	<table id="{{ $id }}" class="table table-hover table-status jw-table jw-table-linked">
		@isset($columns)
		<thead>
			<tr>
			@foreach($columns as $column)
				<th scope="col">{{ $column }}</th>
			@endforeach
			</tr>
		</thead>
		@endisset
		<tbody>

			{{ isset($content) ? $content : $slot }}

		</tbody>
	</table>
</div>