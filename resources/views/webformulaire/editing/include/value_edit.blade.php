@if($champ->name == "paragraph")
    <div class="form-group my-3">
        <label for="value">Text</label>
        <textarea type="text"
                  name="value"
                  class="input-edit-form form-control form-control-sm"
                  id="value_ckedit">{{$champ->value}}</textarea>
    </div>

@else
    <div class="form-group my-3">
        <label for="value">value</label>
        <input type="text"
               name="value"
               value="{{$champ->value}}"
               class="input-edit-form form-control form-control-sm" id="value">
    </div>
@endif
