@if(isset($steps))
	@php
		$f['paragraphe'] = $formById[$steps]['paragraphe'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['type_elements'] = $formById[$steps]['type_elements'];
	@endphp
@endif


@if(isset($f['paragraphe'])  && $f['paragraphe'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}} text_inputs child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}"  >
			@if(request()->is('admin/notification/*'))
			    <h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		    @endif

{{--			<textarea name="{{$f['name_group']}}" id="" class=" form-control myInputs" style="height:100px"--}}
{{--			          {{$f['obligatior']}}--}}
{{--			          data-name="$f['name_group']"--}}
{{--			          data-condition="{{$f['type_elements']}}"--}}
{{--			          placeholder="{{__('fields.'.$f['typeChamp'])}} @if($f['obligatior']) * @endif"--}}
{{--			          cols="30" rows="10" class="form-control"></textarea>--}}


		<p id="wf_Paragraphe " @if(isset($form['stylesCss']['text_inputs'])) style="{{$form['stylesCss']['text_inputs']}} " @endif>
			{{$f['type_elements']}}
		</p>
	</div>
@endif
