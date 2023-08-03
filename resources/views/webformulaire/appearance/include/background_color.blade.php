{{--<div class="form-group">--}}
{{--    <label for="color__{{$value['name']}}" class="row align-items-center">--}}
{{--        <span class="col-4">Fond : </span>--}}

{{--        <input type="color"--}}
{{--               name="{{$value['name']}}[background_color]"--}}
{{--               class="form-control col-8 EditApparence "--}}
{{--               data-name="colorTitle"--}}
{{--               id="background__{{$value['class']}}"--}}
{{--               value="{{collect(json_decode($form['styles']))->toArray()[$value['name']]->background_color??$value['colors']['background-color']}}"--}}
{{--               oninput="updateStyleBackground('{{$value['class']}}')"--}}
{{--        >--}}

{{--    </label>--}}
{{--</div>--}}



<div class="form-group">
    <label for="selec" class="row">
        <span class="col-4"> Background type : </span>

        <div class="col-8">

            <select name="{{$value['name']}}[background_type]" data-elem="{{$value['class']}}" id="selecBgType{{$value['name']}}" class="w-100 form-control" onchange="switchToTransparentElement(this) ">
                <option @if(isset(collect(json_decode($form['styles']))->toArray()[$value['name']]->background_type) && collect(json_decode($form['styles']))->toArray()[$value['name']]->background_type == 'color') selected @endif value="color">color</option>
                <option @if(isset(collect(json_decode($form['styles']))->toArray()[$value['name']]->background_type) && collect(json_decode($form['styles']))->toArray()[$value['name']]->background_type == 'transparent') selected @endif value="transparent">transparent</option>
{{--                <option @if(isset(json_decode($form['styles'])->formStyle->background_type) && json_decode($form['styles'])->formStyle->background_type == 'image') selected @endif value="image">image</option>--}}
            </select>
        </div>

    </label>
</div>

<div class="form-group bg_ColImgElement">
    <label for="background_color__general-form" class="row">
        <span class="col-4"> Background : </span>
        <div class="col-8 innerBg">
            <input type="color"
                   name="{{$value['name']}}[background_color]"

                   class="form-control col-8 EditApparence "
                   value="{{collect(json_decode($form['styles']))->toArray()[$value['name']]->background_color??$value['colors']['background-color']}}"
                   id="background__{{$value['class']}}"
                   oninput="updateStyleBackground('{{$value['class']}}')" />
        </div>
    </label>
</div>
