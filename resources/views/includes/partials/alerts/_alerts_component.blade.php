<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    
    <div class="d-flex align-items-center">
		<i class="fal fa-@if( $type == 'danger' )exclamation-circle @elseif( $type == 'success' )check-circle @elseif( $type == 'warning' )exclamation-triangle @endif mr-3 fa-2x fa-fw"></i>
	    @if(isset($heading))
			<h5 class="alert-heading my-0">{{ $heading }}</h5>
	    @else
	    	{{ $slot }}
	    @endif
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	    </button>
    </div>
	@if(isset($heading))
	<div class="ml-5 pl-2 mt-1">
		{{ $slot }}
	</div>
	@endif
	
</div>

