@if(isset($steps))
	@php
		$f['message'] = $formById[$steps]['message'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['message'])  && $f['message'] !="0" )
	<div class="form-group  mb-1 col-12 field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<textarea name="message//{{$f['name_group']}}"
                  placeholder="@if(isset($conditions[$k]['message'])&& isset($conditions[$k]['message']->placeholder)){{$conditions[$k]['message']->placeholder}} @else{{__('fields.'.$f['message'])}}@endif @if($f['obligatior']) * @endif" id=""
                  cols="30" rows="10" style="height:100px" data-title="{{ __($f['name_group']) }}" data-value="__message__"
		          class="form-control myInputs" {{$f['obligatior']}}></textarea >

	</div>
@endif
