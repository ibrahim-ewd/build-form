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

            <div id="collapse{{$key}}" class=" collapse @if(count((array)$data->champ)==1) show @endif"
                 aria-labelledby="headingOne"
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

                    @if(isset($champ->required))
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
                            @if($champ->type != "satisfaction" )
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
                                                class="checkbox input-switch-use-image " value="" id="use_imsage">
                                            <div class="knobs"></div>
                                            <div class="layer"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-11">
                                    <div class="col-11 mx-3 my-1 parent_list_option table table-hover">
                                        @if($champ->type === "satisfaction")
                                            {{$champ->satisfaction_type ??''}}
                                            <div class="form-group mb-3">
                                                <label for="label">Satisfaction Type</label>
                                                <select name="satisfaction-type" id="satisfaction-type"
                                                        data-option-global="satisfaction-type"
                                                        class="form-select input-edit-option">
                                                    <option value="buttons"
                                                            @if(isset($champ->satisfaction_type) && $champ->satisfaction_type == "buttons") selected @endif>
                                                        Buttons
                                                    </option>
                                                    <option value="emoji"
                                                            @if(isset($champ->satisfaction_type) && $champ->satisfaction_type == "emoji") selected @endif>
                                                        Emoji
                                                    </option>
                                                    <option value="stars"
                                                            @if(isset($champ->satisfaction_type) && $champ->satisfaction_type == "stars") selected @endif>
                                                        Stars
                                                    </option>
                                                    <option value="text"
                                                            @if(isset($champ->satisfaction_type) && $champ->satisfaction_type == "text") selected @endif>
                                                        Text
                                                    </option>
                                                </select>
                                            </div>
                                            @if($champ->satisfaction_type == "stars")
                                                <div class="form-group mb-3">
                                                    <label for="stars">Rating Amount</label>
                                                    <input type="number"
                                                           min="1"
                                                           max="16"
                                                           name="stars|number"
                                                           value="{{$champ->stars->number??5}}"
                                                           class="input-edit-form form-control form-control-sm"
                                                           id="stars">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="stars">Stars Size</label>
                                                    <select name="stars|size" id="stars-size"
                                                            data-option-global="stars-size"
                                                            class="form-select input-edit-form">
                                                        <option value="6"
                                                                @if(isset($champ->stars->size) && $champ->stars->size == "6") selected @endif>
                                                            Small
                                                        </option>
                                                        <option value="4"
                                                                @if(isset($champ->stars->size) && $champ->stars->size == "4") selected @endif>
                                                            Meduim
                                                        </option>
                                                        <option value="2"
                                                                @if(isset($champ->stars->size) && $champ->stars->size == "2") selected @endif>
                                                            Large
                                                        </option>
                                                        <option value="1"
                                                                @if(isset($champ->stars->size) && $champ->stars->size == "1") selected @endif>
                                                            Extra large
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="stars">Stars position</label>

                                                    <div class="switch-field">
                                                        <input type="radio" class="input-edit-form" id="radio-three"
                                                               name="stars|position"
                                                               value="start"
                                                               @if(isset($champ->stars->position) && $champ->stars->position == "start") checked @endif/>
                                                        <label for="radio-three">
                                                            <i class="fa-solid fa-align-left"></i>
                                                        </label>

                                                        <input type="radio" class="input-edit-form" id="radio-four"
                                                               name="stars|position"
                                                               value="center"
                                                               @if(isset($champ->stars->position) && $champ->stars->position == "center") checked @endif/>
                                                        <label for="radio-four">
                                                            <i class="fa-solid fa-align-center"></i>
                                                        </label>


                                                        <input type="radio" class="input-edit-form" id="radio-five"
                                                               name="stars|position"
                                                               value="end"
                                                               @if(isset($champ->stars->position) && $champ->stars->position == "end") checked @endif/>
                                                        <label for="radio-five">
                                                            <i class="fa-solid fa-align-right"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif


                                            @if($champ->satisfaction_type == "emoji")
                                                <div class="form-group mb-3">
                                                    <label for="emoji">Rating Amount</label>
                                                    <select name="emoji|number" id="emoji-number"
                                                            data-option-global="emoji-number"
                                                            class="form-select input-edit-form">
                                                        <option value="5"
                                                                @if(isset($champ->emoji->number) && $champ->emoji->number === "5") selected @endif>
                                                            5
                                                        </option>

                                                        <option value="3"
                                                                @if(isset($champ->emoji->number) && $champ->emoji->number === "3") selected @endif>
                                                            3
                                                        </option>
{{--                                                   --}}
{{--                                                        <option value="2"--}}
{{--                                                                @if(isset($champ->emoji->number) && $champ->emoji->number == "2") selected @endif>--}}
{{--                                                            Large--}}
{{--                                                        </option>--}}
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <?php $emojiImg = $champ->emoji->data[0]->img ?>
                                                    <label for="emoji">Emoji size {{$emojiImg->size??""}}</label>
                                                    <select name="emoji|img|size" id="emoji-size"
                                                            data-option-global="emoji-size"
                                                            class="form-select input-edit-form">
                                                        <option value="emoji-sm"
                                                                @if(isset($emojiImg->size) && $emojiImg->size == "emoji-sm") selected @endif>
                                                            Small
                                                        </option>
                                                        <option value="emoji-md"
                                                                @if(isset($emojiImg->size) && $emojiImg->size == "emoji-md") selected @endif>
                                                            Meduim
                                                        </option>
                                                        <option value="emoji-lg"
                                                                @if(isset($emojiImg->size) && $emojiImg->size == "emoji-lg") selected @endif>
                                                            Large
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="emoji">emoji position</label>

                                                    <div class="switch-field">
                                                        <input type="radio" class="input-edit-form" id="radio-three"
                                                               name="emoji|position"
                                                               value="start"
                                                               @if(isset($champ->emoji->position) && $champ->emoji->position == "start") checked @endif/>
                                                        <label for="radio-three">
                                                            <i class="fa-solid fa-align-left"></i>
                                                        </label>

                                                        <input type="radio" class="input-edit-form" id="radio-four"
                                                               name="emoji|position"
                                                               value="center"
                                                               @if(isset($champ->emoji->position) && $champ->emoji->position == "center") checked @endif/>
                                                        <label for="radio-four">
                                                            <i class="fa-solid fa-align-center"></i>
                                                        </label>


                                                        <input type="radio" class="input-edit-form" id="radio-five"
                                                               name="emoji|position"
                                                               value="end"
                                                               @if(isset($champ->emoji->position) && $champ->emoji->position == "end") checked @endif/>
                                                        <label for="radio-five">
                                                            <i class="fa-solid fa-align-right"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif

                                        @endif

                                        @if($champ->type != "select" )
                                            @if(isset($champ->use_image) && $champ->use_image)


                                                <div class="section-global-config-option">

                                                    <div class="row">
                                                        <div class="form-group mb-3">
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

                                                        <div class="form-group mb-3">
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


                                            @else
                                                <div class="section-global-config-option pb-2">

                                                    <div
                                                        class="groupPositionLabel form-group px-0 mb-3 {{(isset($champ->satisfaction_type)&&$champ->satisfaction_type !=="buttons")?"d-none":""}}">
                                                        <label for="label">Position label</label>
                                                        <select name="position_label" id="position-label"
                                                                data-option-global="position-label"
                                                                class="form-select input-edit-option">
                                                            <option value="position-right"
                                                                    @if(isset($champ->position_label) && $champ->position_label == "position-right") selected @endif>
                                                                Right
                                                            </option>
                                                            <option value="position-left"
                                                                    @if(isset($champ->position_label) && $champ->position_label == "position-left") selected @endif>
                                                                Left
                                                            </option>
                                                            <option value="position-top"
                                                                    @if(isset($champ->position_label) && $champ->position_label == "position-top") selected @endif>
                                                                Top
                                                            </option>
                                                            <option value="label-none"
                                                                    @if(isset($champ->position_label) && $champ->position_label == "label-none") selected @endif>
                                                                Hide
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                        @if($champ->satisfaction_type !== "stars")
                                            <div id="wrap-list-option-edit">

                                                @include("webformulaire.editing.include.list_edit_options")

                                            </div>
                                        @endif
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


