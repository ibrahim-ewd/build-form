<div class="form-group">
    <label for="font_weight__{{$id}}" class="row align-items-center">
                                                                    <span class="col-4">
                                                                        Poids de la police :
                                                                    </span>

        <select
            id="font_weight__{{$value['class']}}"
            name="{{$value['name']}}[font_weight]"
            class="form-control fontSelect col-8"
            data-style="font-weight"
            onchange="getSelectValue('{{$value['class']}}');">
            @for ($f= 100 ; $f<=900 ; $f+=100)
                <option value="{{$f}}" style="font-weight: {{$f}}"
                    @if(isset(json_decode($form['styles'])->title->font_weight) && isset($value['name']) && isset(collect(json_decode($form['styles']))->toArray()[$value['name']]))

                        {{ ($f == collect(json_decode($form['styles']))->toArray()[$value['name']]->font_weight) ? 'selected' : '' }}
                    @else
                    {{ ($f == $value['fontWeight']) ? 'selected' : '' }}
                    @endif
                >
                    {{$f}}
                </option>
            @endfor
        </select>
    </label>
</div>
