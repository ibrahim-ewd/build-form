@if(isset($steps))
	@php
		$f['societe'] = $formById[$steps]['societe'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['societe'])  && $f['societe'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<input type="text" class="form-control myInputs" {{$f['obligatior']}}
		name="societe//{{$f['name_group']}}" data-title="{{ __($f['name_group']) }}" data-value="__societe__"
		       placeholder="@if(isset($conditions[$k]['societe'])&&$conditions[$k]['societe']->placeholder){{$conditions[$k]['societe']->placeholder}} @endif @if($f['obligatior'])*@endif" >
	</div>
@endif
