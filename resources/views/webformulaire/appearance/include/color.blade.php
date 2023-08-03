<div class="form-group">
    <label for="color__{{$value['name']}}" class="row align-items-center">
        <span class="col-4"> Couleur : </span>

        <input type="color"
               name="{{$value['name']}}[color]"
               class="form-control col-8 EditApparence "
               id="color__{{$value['class']}}"

               value="{{collect(json_decode($form['styles']))[$value['name']]->color??$value['colors']['color']}}"
               oninput="updateStyleColor('{{$value['class']}}')"
        >

    </label>
</div>
