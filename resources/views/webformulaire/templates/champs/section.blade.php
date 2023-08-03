@if(isset($steps))
@php
$f['section'] = $formById[$steps]['section'];
$f['typeChamp'] = $formById[$steps]['typeChamp'];
$f['name_group'] = $formById[$steps]['name_group'];
$f['obligatior'] = $formById[$steps]['obligatior'];
@endphp
@endif

@if(isset($f['section'])  && $f['section'] !="0" )
<div class="form-group mb-1 col-12 dropZone-section field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >

</div>
@endif
