<div class="form-group">
    <label for="padding__general-form" class="row">
        <span class="col-4 have-dropdown"> Padding : </span>
        <div class="col-8 row">
            <div class="position-relative p-0 col-6  px-1 ">
                <sub>Haut</sub>

                <div class="input-group">
                    <input type="number" class="form-control"
                           name="{{$value['name']}}[padding_top]"
                           class="form-control EditApparence  "
                           min="0"
                           value="{{collect(json_decode($form['styles']))[$value['name']]->padding_top?? $value['dimension']['padding']['y']}}"
                           id="padding_top__{{$value['class']}}"
                           oninput="updateStyleDimension('{{$value['class']}}')"
                    />
                    <div class="input-group-append"><span class="input-group-text">px</span></div>
                </div>
            </div>
            <div class="position-relative p-0 col-6 px-1 ">
                <sub>Bas</sub>
                <div class="input-group">
                    <input type="number" class="form-control"
                           name="{{$value['name']}}[padding_bottom]"
                           class="form-control EditApparence  "
                           min="0"
                           value="{{collect(json_decode($form['styles']))[$value['name']]->padding_bottom??$value['dimension']['padding']['y']}}"
                           id="padding_bottom__{{$value['class']}}"
                           oninput="updateStyleDimension('{{$value['class']}}')"
                    />
                    <div class="input-group-append"><span class="input-group-text">px</span></div>
                </div>
            </div>
            <div class="position-relative p-0 col-6  px-1 ">
                <sub>Gauche</sub>

                <div class="input-group">
                    <input type="number" class="form-control"
                           name="{{$value['name']}}[padding_left]"
                           class="form-control EditApparence  "
                           value="{{collect(json_decode($form['styles']))[$value['name']]->padding_left??$value['dimension']['padding']['x']}}"
                           id="padding_left__{{$value['class']}}"
                           oninput="updateStyleDimension('{{$value['class']}}')"
                    />
                    <div class="input-group-append"><span class="input-group-text">px</span></div>
                </div>
            </div>
            <div class="position-relative p-0 col-6  px-1 ">
                <sub>Droit</sub>
                <div class="input-group">
                    <input type="number" class="form-control"
                           name="{{$value['name']}}[padding_right]"
                           class="form-control EditApparence  "
                           min="0"
                           value="{{collect(json_decode($form['styles']))[$value['name']]->padding_right??$value['dimension']['padding']['x']}}"
                           id="padding_right__{{$value['class']}}"
                           oninput="updateStyleDimension('{{$value['class']}}')"
                    />
                    <div class="input-group-append"><span class="input-group-text">px</span></div>
                </div>
            </div>
        </div>


    </label>
</div>
