<div class="alert alert-{{ $type ?? 'info' }} alert-dismissible fade show" role="alert">
	<h6>Order <a href="#">#861290</a> is ready for pickup</h6>
 	
 	{{ $slot }}
	
	<small>{{ $time }}</small>

	<a href="#" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">
		<i class="fas fa-times fa-xs"></i>
	</a>

</div>