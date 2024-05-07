<div class="form-group my-3">
    <label for="label">Readonly</label>
    <div class="toggle-button-cover">
        <div class="button-3 button r">
            <input
                type="checkbox"
                name="readonly"
                data-type="boolean"
                {{$champ->readonly ?'checked':''}}
                class="checkbox input-edit-form " value="" id="readonly">
            <div class="knobs"></div>
            <div class="layer"></div>
        </div>
    </div>
</div>
