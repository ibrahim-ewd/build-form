@if(isset($steps))
	@php
		$f['multiple'] = $formById[$steps]['multiple'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['eleme'] = $formById[$steps]['eleme'];
	@endphp
@endif

@if(isset($f['multiple'])  && $f['multiple'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}} multipleClone child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}"
	     data-value="__multiple__"
	     data-title="{{$f['name_group']}}"
	>
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<div class="row">
			@foreach($f['eleme'] as $el)
				<label class="radio radio-outline radio-lg radio-success col-6 py-2 text_inputs"  @if(isset($form['stylesCss']['text_inputs'])) style="{{$form['stylesCss']['text_inputs']}} " @endif>
					<input type="radio" class=" myInputs  check_my_unique"
					       value="{{$el['value']}}"
					       {{-- @if($el['order']==1) checked @endif --}}
					       data-value="__multiple__"
					       name="multiple//{{$f['name_group']}}" >
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
