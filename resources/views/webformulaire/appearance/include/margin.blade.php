

<div class="form-group">
        <label for="margin__general-form" class="row ">
            <span class="col-4 have-dropdown"> Margin : </span>
            <div class="col-8 row">
                <div class="position-relative p-0 col-6  p-1 ">
                    <sub>Haut</sub>
                    <div class="input-group">
                        <input type="number" class="form-control"
                               name="{{$value['name']}}[margin_top]"
                               class="form-control EditApparence  "
                               min="0"
                               value="{{collect(json_decode($form['styles']))[$value['name']]->margin_top?? 0}}"
                               id="margin_top__{{$value['class']}}"
                               oninput="updateStyleDimension('{{$value['class']}}')"
                        />
                        <div class="input-group-append"><span class="input-group-text">px</span></div>
                    </div>
                </div>
                <div class="position-relative p-0 col-6 p-1 ">
                    <sub>Bas</sub>
                    <div class="input-group">
                        <input type="number" class="form-control"
                               name="{{$value['name']}}[margin_bottom]"
                               class="form-control EditApparence  "
                               min="0"
                               value="{{collect(json_decode($form['styles']))[$value['name']]->margin_bottom?? 0 }}"
                               id="margin_bottom__{{$value['class']}}"
                               oninput="updateStyleDimension('{{$value['class']}}')"
                        />
                        <div class="input-group-append"><span class="input-group-text">px</span></div>
                    </div>
                </div>
                <div class="position-relative p-0 col-6  p-1 ">
                    <sub>Gauche</sub>
                    <div class="input-group">
                        <input type="number" class="form-control"
                               name="{{$value['name']}}[margin_left]"
                               class="form-control EditApparence  "
                               value="{{collect(json_decode($form['styles']))[$value['name']]->margin_left?? 0 }}"
                               id="margin_left__{{$value['class']}}"
                               oninput="updateStyleDimension('{{$value['class']}}')"
                        />
                        <div class="input-group-append"><span class="input-group-text">px</span></div>
                    </div>
                </div>
                <div class="position-relative p-0 col-6  p-1 ">
                    <sub>Droit</sub>
                    <div class="input-group">
                        <input type="number" class="form-control"
                               name="{{$value['name']}}[margin_right]"
                               class="form-control EditApparence  "
                               value="{{collect(json_decode($form['styles']))[$value['name']]->margin_right?? 0 }}"
                               id="margin_right__{{$value['class']}}"
                               oninput="updateStyleDimension('{{$value['class']}}')"
                        />
                        <div class="input-group-append"><span class="input-group-text">px</span></div>
                    </div>
                </div>
            </div>

        </label>
</div>
