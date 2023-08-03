
@if(isset($steps))
	@php
		$f['reponsecourte'] = $formById[$steps]['reponsecourte'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['type_elements'] = $formById[$steps]['type_elements'];
	@endphp
@endif

@if(isset($f['reponsecourte'])  && $f['reponsecourte'] !="0" )
	<div class="form-group mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<input type="text" name="text//{{$f['name_group']}}" id="" class=" form-control myInputs"
		       data-value="__text__"
		       {{$f['obligatior']}}
		       data-name="{{$f['name_group']}}"
		       placeholder="@if(isset($conditions[$k]['reponsecourte'])&&$conditions[$k]['reponsecourte']->placeholder){{$conditions[$k]['reponsecourte']->placeholder}} @endif @if($f['obligatior']) * @endif"
		       data-condition="{{$f['type_elements']}}"
		       cols="30" rows="10" class="form-control">
{{--			<textarea ></textarea>--}}
	</div>
@endif
