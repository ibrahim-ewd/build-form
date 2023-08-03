@php
    $alignValue = "start";
    if(collect(json_decode($form['styles']))->count() != 0){
        if($value['name'] == "btn_Envoyer"){
            $alignValue = collect(json_decode($form['styles']))['parentBtn']->text_align;
        }else{
            if(isset(collect(json_decode($form['styles']))->toArray()[$value['name']]->text_align)){
                $alignValue = collect(json_decode($form['styles']))[$value['name']]->text_align;
            }
        }
    }
@endphp
<div class="form-group">
    <label for="textAlign__{{$value['class']}}" class="row align-items-center">
	    <span class="col-4"> Alignement : </span>

        <select id="textAlign__{{$value['class']}}"
                @if($value['name'] == "btn_Envoyer")
                    name="parentBtn[text_align]"
                @else
                    name="{{$value['name']}}[text_align]"
                @endif
                class="form-control col-8"
                onchange="updateStyleDimension('{{$value['class']}}')">



            <option value="start"
                @if(isset($alignValue)){{  $alignValue == "start" ? 'selected' : '' }} @endif>Début</option>

            <option value="center"
                @if(isset($alignValue)){{  $alignValue == "center"? 'selected' : '' }} @endif>Centre</option>

            <option value="end"
                    @if(isset($alignValue)) {{ $alignValue == "end"? 'selected' : '' }} @endif>Fin</option>

        </select>
    </label>
</div>
