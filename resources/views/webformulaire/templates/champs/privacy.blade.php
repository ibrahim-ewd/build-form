
@if(isset($steps))
	@php
		$f['privacy'] = $formById[$steps]['privacy'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['text'] = $formById[$steps]['text'];
	@endphp
@endif

@if(isset($f['privacy'])  && $f['privacy'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<label class="checkbox checkbox-outline checkbox-lg checkbox-success  text_inputs" @if(isset($form['stylesCss']['text_inputs'])) style="{{$form['stylesCss']['text_inputs']}} " @endif>
			<input type="checkbox" name="{{$f['typeChamp']}}//{{$f['name_group']}}"
			       {{$f['obligatior']}}
			       class="form-control myInputs my-inputs-privacy"   />
			<span style="border:1px solid"></span>
			&nbsp; &nbsp; <div class="text__1 ">{!!  $f['text'] !!} @if($f['obligatior']) * @endif</div>
		</label>
	</div>
@endif
