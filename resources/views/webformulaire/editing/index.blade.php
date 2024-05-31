<div class="accordion" id="accordion{{$nameChamp}}">


    <div class="field-edit" data-index="{{$index}}">
        @if(isset($data->display_labels))
            <div class="form-group my-3">
                <label for="display_labels">Display labels</label>
                <div class="toggle-button-cover">
                    <div id="visibility_{{$nameChamp}}" class="button-3 button r">

                        <input
                            type="checkbox"
                            name="display_labels"
                            data-type="boolean"
                            {{($data->display_labels==true) ?'checked':''}}
                            class="checkbox input-edit-form-global " data-edit="global" value="" id="display_labels">
                        <div class="knobs"></div>
                        <div class="layer"></div>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($data->name))
            @include("webformulaire.editing.include.title_edit")
        @endif
    </div>

    <hr>
    <br>
    @foreach($data->champ as $key=>$champ)

        <div class="accordion-item field-edit" id="field-{{$nameChamp}}-{{$key}}" data-name="{{$key}}"
             data-index="{{$index}}">

            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button text-capitalize" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                    {{$key}}
                </button>
            </h2>

            <div id="collapse{{$key}}" class=" collapse @if(count((array)$data->champ)==1) show @endif" aria-labelledby="headingOne"
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
                                    {{(isset($data->champ->{$key}->visibility) && $data->champ->{$key}->visibility==true) ?'checked':''}}
                                    class="checkbox input-edit-form " value="" id="visibility">
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>

                    @if($champ->required != null)
                        @include("webformulaire.editing.include.required_edit")
                    @endif

                    @if(isset($champ->readonly))
                        @include("webformulaire.editing.include.readonly_edit")
                    @endif


                    @if(isset($champ->label))
                        @include("webformulaire.editing.include.label_edit")
                    @endif

                    @if(isset($champ->format_date))

                        @include("webformulaire.editing.include.format_date_edit")
                    @endif


                    @if(isset($champ->notice))

                        @include("webformulaire.editing.include.notice_edit")
                    @endif

                    @if(isset($champ->placeholder))

                        @include("webformulaire.editing.include.placeholder_edit")
                    @endif

                    @if($champ->value != null)

                        @include("webformulaire.editing.include.value_edit")
                    @endif

                    @if(isset($champ->options) && $champ->options != null)
                        <fieldset class="border p-2">
                            <legend class="w-auto float-none px-2">Options</legend>

                            <div class="form-group mx-3  mb-5 my-3">
                                <label for="label-d">Use Image</label>
                                <div class="toggle-button-cover">
                                    <div id="visibility-firstname" class="button-3 button r">
                                        <input
                                            type="checkbox"
                                            name="use_image"
                                            data-type="boolean"
                                            data-function="rebuildEdit"
                                            {{(isset($data->champ->{$key}->use_image) && $data->champ->{$key}->use_image==true) ?'checked':''}}
                                            class="checkbox input-edit-form " value="" id="use_imsage">
                                        <div class="knobs"></div>
                                        <div class="layer"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-11">
                                    <div class="col-11 mx-3 my-1 parent_list_option table table-hover">


                                        @if(isset($champ->use_image) && $champ->use_image)

                                            @if($champ->type != "select" )
                                                <div class="section-global-config-option">

                                                    <div class="row">


                                                        <div class="form-group my-3">
                                                            <label for="label">Size image</label>
                                                            <select name="size" id="size-image"
                                                                    data-option-global="size-image"
                                                                    class="form-select input-edit-option">
                                                                <option value="picture-sm"
                                                                        @if($champ->options[0]->img->size == "picture-sm") selected @endif>
                                                                    Small
                                                                </option>
                                                                <option value="picture-md"
                                                                        @if($champ->options[0]->img->size == "picture-md") selected @endif>
                                                                    Medium
                                                                </option>
                                                                <option value="picture-lg"
                                                                        @if($champ->options[0]->img->size == "picture-lg") selected @endif>
                                                                    Large
                                                                </option>
                                                            </select>
                                                        </div>


                                                        <div class="form-group my-3">
                                                            <label for="label">Position image</label>
                                                            <select name="size" id="position-image"
                                                                    data-option-global="position-image"
                                                                    class="form-select input-edit-option">
                                                                <option value="picture-left"
                                                                        @if(isset($champ->options[0]->img->position) && $champ->options[0]->img->position == "picture-left") selected @endif>
                                                                    Left
                                                                </option>
                                                                <option value="picture-top"
                                                                        @if(isset($champ->options[0]->img->position) && $champ->options[0]->img->position == "picture-top") selected @endif>
                                                                    Top
                                                                </option>
                                                                <option value="picture-right"
                                                                        @if(isset($champ->options[0]->img->position) && $champ->options[0]->img->position == "picture-right") selected @endif>
                                                                    Right
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            @endif
                                        @else

                                            <div class="section-global-config-option pb-2 my-3">
                                                <div class="">


                                                    <div class="form-group px-0 my-3">
                                                        <label for="label">Position label</label>
                                                        <select name="position_label" id="position-label"
                                                                data-option-global="position-label"
                                                                class="form-select input-edit-option">
                                                            <option value="position-left"
                                                                    @if(isset($champ->position_label) && $champ->position_label == "position-left") selected @endif>
                                                                Left
                                                            </option>
                                                            <option value="position-top"
                                                                    @if(isset($champ->position_label) && $champ->position_label == "position-top") selected @endif>
                                                                Top
                                                            </option>
                                                            <option value="position-right"
                                                                    @if(isset($champ->position_label) && $champ->position_label == "position-right") selected @endif>
                                                                Right
                                                            </option>
                                                            <option value="label-none"
                                                                    @if(isset($champ->position_label) && $champ->position_label == "label-none") selected @endif>
                                                                Hide
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div id="wrap-list-option-edit">


                                            @include("webformulaire.editing.include.list_edit_options")
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    @endif


                </div>
            </div>
        </div>

    @endforeach

</div>

{{--<script>--}}
{{--    ClassicEditor--}}
{{--        .create(document.querySelector('#value_ckedit'))--}}
{{--        .catch(error => {--}}
{{--            console.error(error);--}}
{{--        });--}}
{{--</script>--}}


