@if(isset($steps))
	@php
		$f['site_web'] = $formById[$steps]['site_web'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['site_web'])  && $f['site_web'] !="0" )
	<div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<input type="text" class="form-control  myInputs" {{$f['obligatior']}}
		name="site_web//{{$f['name_group']}}" data-title="{{ __($f['name_group']) }}" data-value="__site_web__"
		       placeholder="@if(isset($conditions[$k]['site_web'])&&$conditions[$k]['site_web']->placeholder){{$conditions[$k]['site_web']->placeholder}} @endif @if($f['obligatior']) * @endif" >
	</div>
@endif
