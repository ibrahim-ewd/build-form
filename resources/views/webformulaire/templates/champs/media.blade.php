@if(isset($steps))
	@php
		$f['media'] = $formById[$steps]['media'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif


@if(isset($f['media'])  && $f['media'] !="0" )
	

	
	
	<div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
		
		<div class="wrap-symbol-media @if(isset($f['attributes'])){{json_decode($f['attributes'])->float??''}} @endif">
			<div class="symbol-list d-flex flex-wrap">
				@foreach($f['eleme'] as $key=> $el)
					<div class="symbol @if(isset($f['attributes'])){{json_decode($f['attributes'])->size ??'symbol-30'}} @endif  my-2  mr-5">
						<a href="{{$el['value']}}" title="{{$el['title']}}" >
							<div class="symbol-label" style="background-image: url('/media/svg/social-icons/{{$el['title']}}.svg')"></div>
						</a >
					</div>
				@endforeach
			</div>
		</div>
		
	</div>
@endif
