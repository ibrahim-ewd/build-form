<div class="form-group">
    <label for="font_family__{{$id}}" class="row align-items-center">
	                                                            <span class="col-4">
	                                                                Type font :
	                                                            </span>
        <select id="font_family__{{$value['class']}}"
                name="{{$value['name']}}[font_family]"
                class="form-control col-8"
                onchange="getSelectValue('{{$value['class']}}');">
            @foreach ($fonts as $font)
                <option value="{{$font}}" style="font-family: '{{$font}}', serif"
                @if(isset(collect(json_decode($form['styles']))[$value['name']]->font_family))
                    {{ ($font == collect(json_decode($form['styles']))[$value['name']]->font_family) ? 'selected' : '' }}
                    @endif
                >
                    {{$font}}
                </option>
            @endforeach
        </select>
    </label>
</div>
