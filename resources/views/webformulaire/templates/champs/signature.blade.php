@if(isset($steps))
	@php
		$f['signature'] = $formById[$steps]['signature'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['signature'])  && $f['signature'] !="0" )
{{--	@include('layouts.signature')--}}

	<div class="row w-100 mx-095 field_{{$k}}  position-relative">

			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
			@endif

		<div class="form-group mb-1 col-12 child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >

			<div id="sig" class="sig  bg-white " ></div>
			<textarea id="signatureArea" name="signature//{{ __($f['name_group']) }}" class="signatureArea myInputs"
			          {{$f['obligatior']}}
                      data-title="{{ __($f['name_group']) }}"
			          data-value="__signature__"
                      style="display: none"></textarea>
		</div>
		<div id="clear" class="ml-4 clear">claire</div>
	</div>

@endif
