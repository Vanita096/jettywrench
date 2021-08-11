@component('layouts.partials.modules._table', ['columns' => ['Status', 'Order', 'Date', 'Customer', null]])

	Orders

	@slot('content')
		<tr>
			<td>
				<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="This order is ready to be picked-up">Ready</span>
			</td>

			<td>
				<a href="#665692" class="text-dark">#657812</a>
			</td>

			<td>Jun 29, 3:50pm</td>
			
			<td>
				<a href="#" class="text-dark">Daniel S.</a>
			</td>

			<td>
				<i class="far fa-person-carry" data-toggle="tooltip" data-placement="top" title="Pick-up"></i>
			</td>
		</tr>
	@endslot
	
@endcomponent