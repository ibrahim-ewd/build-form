@if(isset($steps))
	@php
		$f['menuderoulant'] = $formById[$steps]['menuderoulant'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['eleme'] = $formById[$steps]['eleme'];
	@endphp
@endif

@if(isset($f['menuderoulant'])  && $f['menuderoulant'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}} multipleClone child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}"
	     data-value="__multiple__"
	     data-title="{{$f['name_group']}}">

			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<select class="form-control  myInputs check_my_select"  type="select" name="menuderoulant//{{$f['name_group']}}" id="exampleSelect1">
			<option value="" >- Sélectionner -</option>
			@foreach($f['eleme'] as $el)
				@if($el['image'])
					<option value="{{$el['value']}}" style="background:{{$el['image']}}">
					</option>
				@else
					<option value="{{$el['value']}}">
						{{$el['title']}}
					</option>
				@endif
			@endforeach
		</select>
	</div>
@endif
