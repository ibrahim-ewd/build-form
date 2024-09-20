<div class="form-group my-3">
    <label for="name">Name</label>
    <input type="text"
           name="name"
           data-val="{{explode("//",$champ->name)[0]}}"
           value="{{explode("//",$champ->name)[1]}}"
           class="input-edit-form form-control form-control-sm" id="name">
</div>
