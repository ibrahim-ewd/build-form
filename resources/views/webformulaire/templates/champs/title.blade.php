@if(isset($steps))
	@php
		$f['title'] = $formById[$steps]['title'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['title'])  && $f['title'] !="0" )
    <div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['title']}}" id="{{$f['title']}}" >
	    @if(request()->is('admin/notification/*'))
		    <h4 style="font-size: 24px;font-weight: bold">{{$f['name_group']}}</h4>
	    @endif
    </div>
@endif
