
@if(session('success'))
	<div class="alert bg-green alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('success') }}
	</div>
@endif

@if(session('info'))
	<div class="alert bg-teal alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('info') }}
	</div>
@endif

@if(session('danger'))
	<div class="alert bg-red alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('danger') }}
	</div>
@endif

@if(session('warning'))
	<div class="alert bg-orange alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('warning') }}
	</div>
@endif