@if(isset($steps))
	@php
		$f['caseacocher'] = $formById[$steps]['caseacocher'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['eleme'] = $formById[$steps]['eleme'];
	@endphp
@endif

@if(isset($f['caseacocher'])  && $f['caseacocher'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}}  multipleClone child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}"
	     data-value="__caseacocher__"
	     data-title="{{$f['name_group']}}"
	>
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif


		<div class="row">
			@foreach($f['eleme'] as $el)
				<label class="checkbox checkbox-outline checkbox-lg checkbox-success py-2 col-6 text_inputs" data-child=""  @if(isset($form['stylesCss']['text_inputs'])) style="{{$form['stylesCss']['text_inputs']}} " @endif>
					<input type="checkbox" value="{{$el['value']}}" class="myInputs Checkbox_myInputs check_my_checkbox "
					       data-value="__multiple__"
					       name="caseacocher//{{$f['name_group']}}"
					>
					<span style="border:1px solid"></span>
					&nbsp;
					@if($el['image'])
						<img id="myImg" class="image img_privews_option" src="{{$el['image']}}"
						     style=" width: 100px; border-radius: .5rem;">
					@else
						{{$el['title']}}
					@endif
				</label>
			@endforeach
		</div>
	</div>
@endif
