@if(isset($steps))
@php
	$f['telephone'] = $formById[$steps]['telephone'];
	$f['type_elements'] = $formById[$steps]['type_elements'];
	$f['name_group'] = $formById[$steps]['name_group'];
	$f['obligatior'] = $formById[$steps]['obligatior'];
@endphp
@endif

@if(isset($f['telephone'])  && $f['telephone'] !="0" )
	<div class="form-group  col-bs-12 field_{{$k}}  child_{{$f['telephone']}}" id="{{$f['telephone']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<input type="tel" class="form-control myInputs"
		data-condition="{{$f['type_elements']?:'national'}}"
		       name="telephone//{{ __($f['name_group']) }}" data-title="{{ __($f['name_group']) }}" data-value="__telephone__"
		       {{$f['obligatior']}}
		       placeholder="@if(isset($conditions[$k]['telephone'])&& isset($conditions[$k]['telephone']->placeholder)) {{$conditions[$k]['telephone']->placeholder}}@else {{__('fields.'.$f['telephone'])}} @endif @if($f['obligatior'])* @endif" >
	</div>
@endif
