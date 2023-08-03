
@if(isset($steps))
	@php
		$f['captcha'] = $formById[$steps]['captcha'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['captcha'])  && $f['captcha'] !="0" )
	<div class="form-group mb-1 field_{{$k}}  col-12 child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif
		
		<div class="captcha">
               <span>
				{!! captcha_img('flat') !!}
			</span>
			<button type="button" class="btn btn-danger" class="reload" id="reload">
				&#x21bb;
			</button>
		</div>
		<input type="text" name="captcha//{{$f['name_group']}}" {{$f['obligatior']}}
		class="form-control  myInputs col mt-2 mb-2">
	</div>
@endif
