<div class="form-group">
    <label for="font_size__{{$value['class']}}" class="row align-items-center">
	                                        <span class="col-4">
	                                            Taille de police :
	                                        </span>
        <input type="number"
               name="{{$value['name']}}[font_size]"
               class="form-control col-8"
               min="0"
               id="font_size__{{$value['class']}}"
                oninput="updateStyleDimension('{{$value['class']}}')"
               value="{{collect(json_decode($form['styles']))[$value['name']]->font_size??$value['fontSize']}}"

        >

    </label>
</div>
