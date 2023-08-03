<div class="form-group">
    <label for="size__title-{{$id}}" class="row align-items-center">
	    <span class="col-4">  Largeur :  </span>
        <div class="input-group col-8 position-relative">
            <input type="number" class="form-control"
                   name="{{$value['name']}}[width]"
                   class="form-control EditApparence "
                   min="0"
                   value="{{collect(json_decode($form['styles']))[$value['name']]->width?? $value['dimension']['width']}}"
                   id="width__{{$value['class']}}"
                   oninput="updateStyleDimension('{{$value['class']}}')"
            />
            <div class="input-group-append"><span class="input-group-text">px</span></div>

            <sub class="position-absolute text-danger" style="bottom: -0.65em">("0px" = "max-width")</sub>

        </div>

    </label>
</div>
