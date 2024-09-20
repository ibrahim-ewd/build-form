<div class="form-group my-3">
    <label for="label">field type</label>

    <select class="form-control input-select-form form-select-sm" name="field_type_date" id="type">

        <option value="picker" @if(isset($champ->field_type_date) && $champ->field_type_date == "picker") selected @endif class="">Date picker</option>
        <option value="typing" @if(isset($champ->field_type_date) && $champ->field_type_date == "typing") selected @endif class="">Champs date</option>
        <option value="select" @if(isset($champ->field_type_date) && $champ->field_type_date == "select") selected @endif class="">Date deroulante</option>

    </select>
</div>

<div class="form-group my-3">
    <label for="label">Date Format</label>

    <select class="form-control input-select-form form-select-sm" name="format_date" id="type">
        {{--                                @foreach($champ->format_date as $key=>$types)--}}
        <optgroup label="separator /">
            <option value="dd-mm-yyyy" @if($champ->format_date == "dd-mm-yyyy") selected @endif class="">dd-mm-yy
            </option>
            <option value="dd/mm/yyyy" @if($champ->format_date == "dd/mm/yyyy") selected @endif class="">dd/mm/yy
            </option>
            <option value="dd.mm.yyyy" @if($champ->format_date == "dd.mm.yyyy") selected @endif class="">dd.mm.yy
            </option>
        </optgroup>
        {{--                                @endforeach--}}
    </select>
</div>
