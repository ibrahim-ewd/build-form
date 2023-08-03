<div class="form-group">
    <label for="height__{{$value['class']}}" class="row align-items-center">
	    <span class="col-4">  Hauteur :  </span>
        <div class="input-group position-relative col-8">
            <input type="number" class="form-control"
                   name="{{$value['name']}}[height]"
                   class="form-control EditApparence "
                   min="0"
                   value="{{collect(json_decode($form['styles']))[$value['name']]->height?? $value['dimension']['height']}}"
                   id="height__{{$value['class']}}"
                   oninput="updateStyleDimension('{{$value['class']}}')"
            />
            <sub class="position-absolute text-danger" style="bottom: -0.65em">("0px" = "max-height")</sub>

            <div class="input-group-append"><span class="input-group-text">px</span></div>
        </div>

    </label>
</div>
