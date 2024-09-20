<fieldset class="border p-2">
    <legend class="w-auto float-none px-2">Options</legend>
    <div class="form-group my-3">
        <label for="maxSize">taille max</label>
        <input type="number"
               min="0"
               name="maxSize"
               value="{{$champ->maxSize}}"
               class="input-edit-form form-control form-control-sm" id="maxSize">
    </div>


    <div class="form-group my-3">
        <div class="col-12 px-1 my-3  my-1">
            <label for="Extension_autorisees">Extension autorisées</label>
            <input name='input-custom-dropdown' id="Extension_autorisees" class='tagify--custom-dropdown' placeholder='Type an English letter'
                   value='{{json_encode($champ->extensions)}}'>

            <p class="notif text-muted"><em>saisie (par ex .jpeg, .pdf …)</em>. <span class="text-danger"></span></p>
        </div>

    </div>

    <div class="form-group my-3">
        <label for="number_file">number file</label>
        <input type="text"
               name="number_file"
               value="{{$champ->number_file}}"
               class="input-edit-form form-control form-control-sm" id="number_file">
    </div>
</fieldset>
