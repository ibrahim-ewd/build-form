<div class="accordion" id="accordion{{$nameChamp}}">
xcvxcv
    @foreach($data->champ as $key=>$champ)

        <div class="accordion-item field-edit" id="field-{{$nameChamp}}-{{$key}}" data-name="{{$key}}"
             data-index="{{$index}}">

            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                    {{$key}}
                </button>
            </h2>

            <div id="collapse{{$key}}" class=" collapse" aria-labelledby="headingOne"
                 data-bs-parent="#accordionIdentity">
                <div class="accordion-body">

                    <div class="form-group my-3">
                        <label for="label-d">Visibility</label>
                        <div class="toggle-button-cover">
                            <div id="visibility-firstname" class="button-3 button r">
                                <input
                                    type="checkbox"
                                    name="visibility"
                                    data-type="boolean"
                                    {{(isset($data->champ->{$key}->visibility)) ?'checked':''}}
                                    class="checkbox input-edit-form " value="" id="visibility">
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>

                    @if($champ->label != null)
                        <div class="form-group my-3">
                            <label for="label">Label</label>
                            <input type="text"
                                   name="label"
                                   value="{{$champ->label}}"
                                   class="input-edit-form form-control  form-control-sm"
                                   id="label">
                        </div>
                    @endif

                    @if($champ->notice != null)
                        <div class="form-group my-3">
                            <label for="label">notice</label>
                            <input type="text"
                                   name="notice"
                                   value="{{$champ->notice}}"
                                   class="input-edit-form form-control form-control-sm"
                                   id="notice">
                        </div>
                    @endif

                    @if($champ->required != null)
                        <div class="form-group my-3">
                            <label for="label">Required</label>
                            <div class="toggle-button-cover">
                                <div id="button-3" class="button-3 button r">
                                    <input
                                        type="checkbox"
                                        name="required"
                                        data-type="boolean"
                                        {{$champ->required ?'checked':''}}
                                        class="checkbox input-edit-form " value="" id="Required">
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($champ->readonly != null)
                        <div class="form-group my-3">
                            <label for="label">readonly</label>
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
                    @endif

                </div>
            </div>
        </div>

    @endforeach
</div>
