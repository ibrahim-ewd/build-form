@if(isset($steps))
@php
	$f['rue_one'] = $formById[$steps]['rue_one'];
	$f['obligatior'] = $formById[$steps]['obligatior'];
	$f['rue_two'] = $formById[$steps]['rue_two'];
	$f['code_Postal'] = $formById[$steps]['code_Postal'];
	$f['ville'] = $formById[$steps]['ville'];
	$f['region'] = $formById[$steps]['region'];
	$f['pays'] = $formById[$steps]['pays'];
	@endphp
@endif


<div class=" row w-100 mx-095 field_{{$k}} @if(request()->is('admin/formulaires/apparence/*')) removepaddig  @endif">
		@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px" >{{$f['name_group']}}</h4>
	@endif

@if(isset($f['rue_one'])  && $f['rue_one'] !="0" )

	<div class="form-group  col-bs-sm-6 showElement  col-bs-12 field_{{$k}} child_{{$f['rue_one']}}" id="{{$f['rue_one']}}">

		<input type="text" data-title="{{ __('fields.'.$f['rue_one']) }}" data-value="__rue__"
		       placeholder="@if(isset($conditions[$k]['rue_one'])&& isset($conditions[$k]['rue_one']->placeholder)) {{$conditions[$k]['rue_one']->placeholder}}@else {{__('fields.'.$f['rue_one'])}} @endif @if(isset($conditions[$k]['rue_one'])&&$conditions[$k]['rue_one']->required) * @endif"
		       @if(isset($conditions[$k]['rue_one']) && $conditions[$k]['rue_one']->required) required @endif name="rue//Rue"
		       class="myInputs form-control">
	</div>

@endif
@if(isset($f['rue_two'])  && $f['rue_two'] !="0" )

	<div class="form-group  col-bs-sm-6 showElement  col-bs-12 child_{{$f['rue_two']}}" id="{{$f['rue_two']}}">
		<input type="text" data-title="{{ __('fields.'.$f['rue_two']) }}" data-value="__rue_2__"
		       placeholder="@if(isset($conditions[$k]['rue_two'])&& isset($conditions[$k]['rue_two']->placeholder)) {{$conditions[$k]['rue_two']->placeholder}}@else {{__('fields.'.$f['rue_two'])}} @endif @if(isset($conditions[$k]['rue_two'])&&$conditions[$k]['rue_two']->required) * @endif"
		       @if(isset($conditions[$k]['rue_two'])&&$conditions[$k]['rue_two']->required) required @endif name='rue_2//Rue 2'
		       class="myInputs form-control">
	</div>
@endif
@if(isset($f['code_Postal'])  && $f['code_Postal'] !="0" )

	<div class="form-group  col-bs-sm-6 showElement  col-bs-12 child_{{$f['code_Postal']}}" id="{{$f['code_Postal']}}">

		<input type="text" data-title="{{ __('fields.'.$f['code_Postal']) }}" data-value="__code_postal__"
		       placeholder="@if(isset($conditions[$k]['code_Postal'])&& isset($conditions[$k]['code_Postal']->placeholder)) {{$conditions[$k]['code_Postal']->placeholder}}@else {{__('fields.'.$f['code_Postal'])}} @endif @if(isset($conditions[$k]['code_Postal'])&&$conditions[$k]['code_Postal']->required) * @endif"
		       @if(isset($conditions[$k]['code_Postal'])&&$conditions[$k]['code_Postal']->required) required @endif name='code_postal//Code postal'
		       class="myInputs form-control">
	</div>
@endif
@if(isset($f['ville'])  && $f['ville'] !="0" )

	<div class="form-group  col-bs-sm-6 showElement  col-bs-12 child_{{$f['ville']}}" id="{{$f['ville']}}">

		<input type="text" data-title="{{ __('fields.'.$f['ville']) }}" data-value="__ville__"
		       placeholder="@if(isset($conditions[$k]['ville'])&& isset($conditions[$k]['ville']->placeholder)) {{$conditions[$k]['ville']->placeholder}} @else {{__('fields.'.$f['ville'])}}@endif @if(isset($conditions[$k]['ville'])&&$conditions[$k]['ville']->required) * @endif"
		       @if(isset($conditions[$k]['ville'])&&$conditions[$k]['ville']->required) required @endif name='ville//Ville'  {{$f['ville']}}
		       class="myInputs form-control">
	</div>
@endif

@if(isset($f['region'])  && $f['region'] !="0" )

	<div class="form-group  col-bs-sm-6 showElement  col-bs-12 child_{{$f['region']}}" id="{{$f['region']}}">

		<input type="text" data-title="{{ __('fields.'.$f['region']) }}" data-value="__region__"
		       placeholder="@if(isset($conditions[$k]['region'])&& isset($conditions[$k]['region']->placeholder)) {{$conditions[$k]['region']->placeholder}} @else {{__('fields.'.$f['region'])}}@endif @if(isset($conditions[$k]['region'])&&$conditions[$k]['region']->required) * @endif"
		       @if(isset($conditions[$k]['region'])&&$conditions[$k]['region']->required) required @endif name='region//Région'   {{$f['region']}}
		       class="myInputs form-control">
	</div>
@endif

@if(isset($f['pays'])  && $f['pays'] !="0" )

	<div class="form-group  col-bs-sm-6 showElement  col-bs-12 child_{{$f['pays']}}" id="{{$f['pays']}}">

		<input type="text" data-title="{{ __('fields.'.$f['pays']) }}" data-value="__pays__"
		       placeholder="@if(isset($conditions[$k]['pays'])&& isset($conditions[$k]['pays']->placeholder)) {{$conditions[$k]['pays']->placeholder}} @else {{__('fields.'.$f['pays'])}}@endif @if(isset($conditions[$k]['pays'])&&$conditions[$k]['pays']->required) * @endif"
		       @if(isset($conditions[$k]['pays'])&&$conditions[$k]['pays']->required) required @endif name='pays//Pays'   {{$f['pays']}}
		       class="myInputs form-control">
	</div>
@endif
</div>
