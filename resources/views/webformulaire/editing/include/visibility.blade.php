<div class="form-group my-3">
{{--    <label for="label-d">Visibility</label>--}}
    <div class="toggle-button-cover">
        <div id="visibility-firstname" class="button-3 button r">
            <input
                type="checkbox"
                name="visibility"
                data-type="boolean"
                {{(isset($data->champ->{$key}->visibility) && $data->champ->{$key}->visibility==true) ?'checked':''}}
                class="checkbox input-edit-form " value="" id="visibility">
            <div class="knobs"></div>
            <div class="layer"></div>
        </div>
    </div>
</div>
