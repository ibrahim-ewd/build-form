@if(isset($steps))
	@php
		$f['email'] = $formById[$steps]['email'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['email'])  && $f['email'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >

			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif
		<input type="email" class="form-control myInputs" {{$f['obligatior']}}
		       name="email//{{$f['name_group']}}" data-title="{{ __($f['name_group']) }}" data-value="__email__"
		       placeholder="@if(isset($conditions[$k]['email'])&& isset($conditions[$k]['email']->placeholder)) {{$conditions[$k]['email']->placeholder}}@else {{__('fields.'.$f['email'])}}@endif  @if($f['obligatior'])* @endif" >
	</div>
@endif
