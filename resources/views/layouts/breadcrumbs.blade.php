@if (count($breadcrumbs))
	
	<ol class="breadcrumb breadcrumb-dot text-muted font-size-h6 p-0 font-weight-bold">
		@foreach ($breadcrumbs as $breadcrumb)
			
			
			@if ($breadcrumb->url && !$loop->last)
				<li class="breadcrumb-item pe-3"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
			@else
				<li class="breadcrumb-item text-muted">{{ $breadcrumb->title }}</li>
			@endif
		
		@endforeach
	</ol>

@endif