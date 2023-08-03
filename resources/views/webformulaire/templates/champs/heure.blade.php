@if(isset($steps))
	@php
		$f['heure'] = $formById[$steps]['heure'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['type_elements'] = $formById[$steps]['type_elements'];
	@endphp
@endif

@if($f['type_elements']=="24h")
	<div  class="form-group  col-12  field_{{$k}}  child_{{$f['typeChamp']}} timepicker24 " id="{{$f['typeChamp']}}" data-index="0">
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif
		<div class="input-group">
			<input class="form-control  myInputs wf_timePicker"
			       name="heure//{{$f['name_group']}}"
			       {{$f['obligatior']}}
			       id="kt_timepicker_2"
			       data-type="24"
			       data-value="__heure__"
			       readonly
			       placeholder="Sélectionnez l'heure  @if($f['obligatior']) * @endif"
			       type="text"/>

			<div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                             <i class="la la-clock-o"></i>
                                                                            </span>
			</div>
		</div>
	</div>
@else
	<div class="form-group  col-12  child_{{$f['typeChamp']}} timepicker12 "
	     id="{{$f['typeChamp']}}" data-index="0" >
		<div class="input-group ">
			<input class="form-control  myInputs wf_timePicker"
			       data-type="12"
			       data-value="__heure__"
			       name="heure//{{$f['name_group']}}" {{$f['obligatior']}}
			       id="kt_timepicker_3" readonly placeholder="Select time" type="text"/>
			<div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                             <i class="la la-clock-o"></i>
                                                                            </span>
			</div>
		</div>
	</div>
@endif
