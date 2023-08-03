@if(isset($steps))
	@php
		$f['date'] = $formById[$steps]['date'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
		$f['type_elements'] = $formById[$steps]['type_elements'];
	@endphp
@endif




@if(isset($f['type_elements']))
	<div class=" row w-100 field_{{$k}} ">
		
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif
		
		@if($f['type_elements'] == "selection_date")
			<div class="form-group mb-1 col-12 date_deroulante_Cl  date_deroulante_zonne  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}">
				<div class="input-group date" >
	
					<input type="text"  name="date//{{$f['name_group']}}" {{$f['obligatior']}}
							data-value="__date__"
					       class="form-control myInputs wf_datePicker"
					       readonly placeholder id=""/>
	
					<div class="input-group-append">
		                    <span class="input-group-text">
		                         <i class="la la-calendar"></i>
		                    </span>
					</div>
	
				</div>
			</div>
		@elseif($f['type_elements'] == "date_deroulante")
	
			<div class="form-group mb-1 col-12 date_deroulante_Cl01 date_deroulante_Cl child_{{$f['typeChamp']}}"
			     data-value="__date__"
			     data-type="{{$f['date_type']}}">
				<input type="hidden" class="joined" {{$f['obligatior']}}      name="joined" value="{{$f['date_type']}}"  >
			</div>
		@else
			<div class="form-group   mb-1 col-12 date_deroulante_Cl01 date_zonn child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}">
				<input type="text" 	data-value="__date__"
				       name="date//{{$f['name_group']}}"   placeholder="{{date('d-m-Y')}} @if(isset($f['obligatior'])) * @endif"
				       @if(isset($f['obligatior'])) {{$f['obligatior']}}@endif
				       class="form-control  myInputs" >
			</div>
		@endif

	</div>
@endif
