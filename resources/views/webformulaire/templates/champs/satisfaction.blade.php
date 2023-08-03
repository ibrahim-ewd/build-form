@if(isset($steps))
	@php
		$f['satisfaction'] = $formById[$steps]['satisfaction'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['eleme'] = $formById[$steps]['eleme'];

	@endphp
@endif

@php
	if($form['fields'][$k]['type_elements']=='text'){
				$defaultValue = "---";
			}elseif ($form['fields'][$k]['type_elements']=='default'){
				$defaultValue = 0;
			}else{
				$defaultValue = "0/".count($f['eleme']);
			}
@endphp
@if(isset($f['satisfaction'])  && $f['satisfaction'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}} multipleClone child_{{$f['typeChamp']}}"

	     data-title="{{$f['name_group']}}"
	     data-value="__satisfaction__"
	     id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<div class="row">

{{--			<input type="hidden" value="{{$form['fields'][$k]['type_elements']}}" name="Type_Echelle de satisfaction[{{$k}}]" >--}}

			<input type="radio" data-type="{{$form['fields'][$k]['type_elements']}}" id="radio{{'00_'.$k}}"
			       value="{{$form['fields'][$k]['type_elements']}}/{{$defaultValue}}" class="d-none"
			       name="satisfaction//{{$f['name_group']}}" checked="checked">
		@foreach($f['eleme'] as  $order=>$el)


				@if($form['fields'][$k]['type_elements'] == 'star')
					<label class="py-2 col d-flex align-items-center justify-content-center " for="radio{{$order.'_'.$k}}">
						<i class="fa fa-star fa-2X  cursor-pointer emojy-form emojy_form_star " data-order="{{$order}}" data-index=""></i>
						<input type="radio" data-type="{{$form['fields'][$k]['type_elements']}}" id="radio{{$order.'_'.$k}}"
						       data-value="__satisfaction__"
						       data-title="{{$f['name_group']}}"
						       value="{{$form['fields'][$k]['type_elements']}}/{{$order+1}}/{{count($f['eleme'])}}" class="d-none myInput_Statisfaction"
						       name="satisfaction//{{$f['name_group']}}" >

					</label>

				@elseif($form['fields'][$k]['type_elements'] == 'text')
					<label class=" py-2 col-12 cursor-pointer emojy_label_title text_inputs" for="radio{{$order.'_'.$k}}"  @if(isset($form['stylesCss']['text_inputs'])) style="{{$form['stylesCss']['text_inputs']}} " @endif>
						<input type="radio" data-type="{{$form['fields'][$k]['type_elements']}}" id="radio{{$order.'_'.$k}}"
						       data-value="__satisfaction__"
						       data-title="{{$f['name_group']}}"
						       value="{{$form['fields'][$k]['type_elements']}}/{{$el['title']}}" name="satisfaction//{{$f['name_group']}}"  class="emojy_form_star emojy_form_title"  style="display: none"  data-order="{{$order}}" data-index="" >
						<span></span>
						&nbsp;
						{{$el['title']}}
					</label>
				@else
					<label class="radio radio-outline radio-lg radio-success  py-2 col" for="radio{{$order.'_'.$k}}">
						<input type="radio"  value="{{$form['fields'][$k]['type_elements']}}/{{$el['value']}}"
						       data-type="{{$form['fields'][$k]['type_elements']}}" id="radio{{$order.'_'.$k}}"
						       data-value="__satisfaction__"
						       data-title="{{$f['name_group']}}"
						       name="satisfaction//{{$f['name_group']}}" >
						<span style="border:1px solid"></span>
{{--						{{$el['title']}}--}}
					</label>
				@endif
			@endforeach

		</div>
	</div>
@endif
