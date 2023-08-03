@if(isset($steps))
	@php
		$f['separateur'] = $formById[$steps]['separateur'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['separateur'])  && $f['separateur'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif
		
		<div class="col-12 separator  myInputs separator-solid mt-8 mb-5"></div>
	</div>
@endif
