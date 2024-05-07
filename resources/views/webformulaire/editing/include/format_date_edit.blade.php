<div class="form-group my-3">
    <label for="label">Date Format</label>

    <select class="form-select input-select-form form-select-sm" name="type" id="type">
        {{--                                @foreach($champ->format_date as $key=>$types)--}}
        <optgroup label="separator /">
            <option value="dd/mm/yy" class="">dd/mm/yy</option>
        </optgroup>
        {{--                                @endforeach--}}
    </select>
</div>
