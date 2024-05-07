<div class="form-group my-3">
    <label for="label">Required</label>
    <div class="toggle-button-cover">
        <div id="button-3" class="button-3 button r">
            <input
                type="checkbox"
                name="required"
                data-type="boolean"
                {{isset($champ->required) && $champ->required==true ?'checked':''}}
                class="checkbox input-edit-form " value="" id="Required">
            <div class="knobs"></div>
            <div class="layer"></div>
        </div>
    </div>
</div>
