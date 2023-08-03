@if(isset($steps))
	@php
		$f['message'] = $formById[$steps]['message'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['message'])  && $f['message'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif
		<textarea name="{{$f['typeChamp']}}//{{$f['name_group']}}"
		          data-value="__commentaire__"
		          placeholder="{{__('fields.'.$f['message'])}}" id="" cols="30" rows="10" style="height:100px"
		          class="form-control myInputs" {{$f['obligatior']}}></textarea >

	</div>
@endif
