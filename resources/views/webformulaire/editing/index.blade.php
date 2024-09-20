<div class="accordion" id="accordion{{$nameChamp}}">


    <div class="field-edit" data-index="{{$index}}">
        @if(isset($data->display_labels) && 1==2)
            <div class="form-group my-5">
                <label for="display_labels" class="m-0">Display labels</label>
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


        @if(isset($data->display_title))
            <div class="form-group my-5">
                <label for="display_title" class="m-0">Display title</label>
                <div class="toggle-button-cover">
                    <div id="visibility_{{$nameChamp}}" class="button-3 button r">

                        <input
                            type="checkbox"
                            name="display_title"
                            data-type="boolean"
                            {{($data->display_title==true) ?'checked':''}}
                            class="checkbox input-edit-form-global " data-edit="global" value="" id="display_title">
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

    <br>
    <hr>
    <br>
    <div class="accordion accordion-toggle-arrow" id="accordionEditFields">

        @foreach($data->champ??[] as $key=>$champ)
            <div class="accordion-item field-edit" id="field-{{$nameChamp}}-{{$key}}" data-name="{{$key}}"
                 data-index="{{$index}}">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-column position-relative">
                            <div class="position-absolute top-50 right-0">
                                @if(isset($champ->visibility) && $key !== "recaptcha")
                                    @include("webformulaire.editing.include.visibility")
                                @endif
                            </div>
                            <div class="card-title collapsed " data-toggle="collapse"
                                 data-target="#collapseOne{{$key}}" aria-expanded="false">
                                {{__("form.".$key)}}

                            </div>
                        </div>
                    </div>
                    <div id="collapseOne{{$key}}" class="collapse" data-parent="#accordionEditFields" style="">
                        <div class="card-body">
                            <div class="example-tools" id="elements{{$key}}">

                                <div class="wxc">


                                    @if(isset($champ->required) && $key !== "recaptcha")
                                        @include("webformulaire.editing.include.required_edit")
                                    @endif

                                    @if(isset($champ->readonly) && $key !== "recaptcha")
                                        @include("webformulaire.editing.include.readonly_edit")
                                    @endif

                                    @if(isset($champ->name))
                                        @include("webformulaire.editing.include.name_edit")
                                    @endif

                                    @if(isset($champ->label)  && $champ->label != false && 1==2)
                                        @include("webformulaire.editing.include.label_edit")
                                    @endif

                                    @if(isset($champ->format_date) && $champ->type=="date")
                                        @include("webformulaire.editing.include.format_date_edit")
                                    @endif

                                    @if(isset($champ->notice) && $champ->placeholder != false)

                                        @include("webformulaire.editing.include.notice_edit")
                                    @endif

                                    @if(isset($champ->placeholder) && $champ->placeholder != false)
                                        @include("webformulaire.editing.include.placeholder_edit")
                                    @endif

                                    @if(isset($champ->data_sitekey) &&  $key == "captcha")
                                        @include("webformulaire.editing.include.data_sitekey")
                                    @endif

                                    @if(isset($champ->value) && $champ->value != false && $champ->type != "satisfaction" )

                                        @include("webformulaire.editing.include.value_edit")
                                    @endif

                                    @if(isset($champ->content) && $champ->type != "satisfaction" )
                                        @include("webformulaire.editing.include.content")
                                    @endif

                                    @if(isset($champ->style) && 1==2)
                                        @include("webformulaire.editing.include.style")
                                    @endif

                                    @if(isset($champ->type) && $champ->type == "import")
                                        @include("webformulaire.editing.include.import")
                                    @endif

                                    @if(isset($champ->options) && $champ->options != null)
                                        <fieldset class="border p-2">
                                            <legend class="w-auto float-none px-2">Options</legend>

                                            @if($champ->type != "satisfaction" && $champ->type != "select")
                                                <div class="form-group mx-3  mb-5 my-3">
                                                    <label for="label-d">Use Image</label>
                                                    <div class="toggle-button-cover">
                                                        <div id="visibility-firstname" class="button-3 button r">
                                                            <input
                                                                type="checkbox"
                                                                name="use_image"
                                                                data-type="boolean"
                                                                data-function="rebuildEdit"
                                                                data-name="{{$data->name}}"
                                                                {{(isset($data->champ->{$key}->use_image) && $data->champ->{$key}->use_image==true) ?'checked':''}}
                                                                class="checkbox input-switch-use-image " value=""
                                                                id="use_imsage">
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
                                                            <div class="form-group mb-3">
                                                                <label for="label">Satisfaction Type</label>
                                                                <select name="satisfaction-type" id="satisfaction-type"
                                                                        data-option-global="satisfaction-type"
                                                                        class="form-control input-edit-option">
                                                                    {{--                                                    <option value="buttons"--}}
                                                                    {{--                                                            @if(isset($champ->satisfaction_type) && $champ->satisfaction_type == "buttons") selected @endif>--}}
                                                                    {{--                                                        Buttons--}}
                                                                    {{--                                                    </option>--}}
                                                                    {{--                                                    <option value="emoji"--}}
                                                                    {{--                                                            @if(isset($champ->satisfaction_type) && $champ->satisfaction_type == "emoji") selected @endif>--}}
                                                                    {{--                                                        Emoji--}}
                                                                    {{--                                                    </option>--}}
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
                                                                            class="form-control input-edit-form">
                                                                        <option value="md"
                                                                                @if(isset($champ->stars->size) && $champ->stars->size == "md") selected @endif>
                                                                            Small
                                                                        </option>
                                                                        <option value="lg"
                                                                                @if(isset($champ->stars->size) && $champ->stars->size == "lg") selected @endif>
                                                                            Meduim
                                                                        </option>
                                                                        <option value="2x"
                                                                                @if(isset($champ->stars->size) && $champ->stars->size == "2x") selected @endif>
                                                                            Large
                                                                        </option>
                                                                        <option value="3x"
                                                                                @if(isset($champ->stars->size) && $champ->stars->size == "3x") selected @endif>
                                                                            Extra large
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                @include("webformulaire.editing.include.align",[
                                                                                    'item'=>$champ->stars,
                                                                                    'name'=>'stars|position'
                                                                                    ])
                                                            @endif

                                                            @if($champ->satisfaction_type == "emoji")
                                                                <div class="form-group mb-3">
                                                                    <label for="emoji">Rating Amount</label>
                                                                    <select name="emoji|number" id="emoji-number"
                                                                            data-option-global="emoji-number"
                                                                            class="form-control input-edit-form">
                                                                        <option value="5"
                                                                                @if(isset($champ->emoji->number) && $champ->emoji->number === "5") selected @endif>
                                                                            5
                                                                        </option>

                                                                        <option value="3"
                                                                                @if(isset($champ->emoji->number) && $champ->emoji->number === "3") selected @endif>
                                                                            3
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <?php $emojiImg = $champ->emoji->data[0]->img ?>
                                                                    <label for="emoji">Emoji
                                                                        size {{$emojiImg->size??""}}</label>
                                                                    <select name="emoji|img|size" id="emoji-size"
                                                                            data-option-global="emoji-size"
                                                                            class="form-control input-edit-form">
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
                                                                        <input type="radio" class="input-edit-form"
                                                                               id="radio-three"
                                                                               name="emoji|position"
                                                                               value="start"
                                                                               @if(isset($champ->emoji->position) && $champ->emoji->position == "start") checked @endif/>
                                                                        <label for="radio-three">
                                                                            <i class="fa fa-align-left"></i>
                                                                        </label>

                                                                        <input type="radio" class="input-edit-form"
                                                                               id="radio-four"
                                                                               name="emoji|position"
                                                                               value="center"
                                                                               @if(isset($champ->emoji->position) && $champ->emoji->position == "center") checked @endif/>
                                                                        <label for="radio-four">
                                                                            <i class="fa fa-align-center"></i>
                                                                        </label>


                                                                        <input type="radio" class="input-edit-form"
                                                                               id="radio-five"
                                                                               name="emoji|position"
                                                                               value="end"
                                                                               @if(isset($champ->emoji->position) && $champ->emoji->position == "end") checked @endif/>
                                                                        <label for="radio-five">
                                                                            <i class="fa fa-align-right"></i>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endif



                                                            @if($champ->satisfaction_type == "text")
                                                                <div class="form-group mb-3">
                                                                    <label for="direction">Direction</label>
                                                                    <select name="direction" id="direction"
                                                                            class="form-control input-edit-form">
                                                                        <option value="row"
                                                                                @if(isset($champ->direction) && $champ->direction === "row") selected @endif>
                                                                            Horizontal
                                                                        </option>

                                                                        <option value="column"
                                                                                @if(isset($champ->direction) && $champ->direction === "column") selected @endif>
                                                                            Vertical
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="section-global-config-option">

                                                                    <div class="row">
                                                                        <div class="col-12 form-group mb-3">
                                                                            <label for="label">Size image</label>
                                                                            <select name="size" id="size-image"
                                                                                    data-option-global="size-image"
                                                                                    class="form-control input-edit-option">
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

                                                                        <div class="col-12 form-group mb-3">
                                                                            <label for="label">Position image</label>
                                                                            <select name="size" id="position-image"
                                                                                    data-option-global="position-image"
                                                                                    class="form-control input-edit-option">
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


                                                            @endif

                                                        @endif

                                                        @if($champ->type != "select" )
                                                            @if(isset($champ->use_image) && $champ->use_image)

                                                                <div class="section-global-config-option">

                                                                    <div class="row">
                                                                        <div class="col-12 form-group mb-3">
                                                                            <label for="label">Size image</label>
                                                                            <select name="size" id="size-image"
                                                                                    data-option-global="size-image"
                                                                                    class="form-control input-edit-option">
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

                                                                        <div class="col-12 form-group mb-3">
                                                                            <label for="label">Position image</label>
                                                                            <select name="size" id="position-image"
                                                                                    data-option-global="position-image"
                                                                                    class="form-control input-edit-option">
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
                                                                        <select name="position_label"
                                                                                id="position-label"
                                                                                data-option-global="position-label"
                                                                                class="form-control input-edit-option">
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
                                                                                bottom
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

                                                        @if(isset($champ->satisfaction_type))
                                                            @if($champ->satisfaction_type != "stars")
                                                                <div id="wrap-list-option-edit">
                                                                    @include("webformulaire.editing.include.list_edit_options_satistfaction")
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div id="wrap-list-option-edit">

                                                                @include("webformulaire.editing.include.list_edit_options")

                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    @endif

                                    @if(isset($champ->medias) && $champ->medias != null)
                                        <fieldset class="border p-2">
                                            <legend class="w-auto float-none px-2">Medias</legend>

                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="col-11 mx-3 my-1 parent_list_medias table table-hover">
                                                        <div class="section-global-config-medias">

                                                            <div class="row">
                                                                <div class="col-12 form-group mb-3">
                                                                    <label for="medias_list">Medias</label>
                                                                    <select name="medias_list" id="medias_list"
                                                                            class="form-control select-list-medias">
                                                                        <option value="">-- Slectioner un média --
                                                                        </option>
                                                                        <option value="facebook">facebook</option>
                                                                        <option value="instagram">instagram</option>
                                                                        <option value="twitter">twitter</option>
                                                                        <option value="github">github</option>
                                                                        <option value="youtube">youtube</option>
                                                                        <option value="google">google</option>
                                                                        <option value="dribbble">dribbble</option>
                                                                    </select>
                                                                </div>


                                                                <div class="col-12 form-group mb-3">
                                                                    <label for="label">Size image</label>
                                                                    <select name="size" id="size-image"
                                                                            data-media-global="size"
                                                                            class="form-control input-edit-medias">
                                                                        <option value="30"
                                                                                @if(isset($champ->size) && $champ->size == "30") selected @endif>
                                                                            Small
                                                                        </option>
                                                                        <option value="40"
                                                                                @if(isset($champ->size) && $champ->size == "40") selected @endif>
                                                                            Medium
                                                                        </option>
                                                                        <option value="50"
                                                                                @if(isset($champ->size) && $champ->size == "50") selected @endif>
                                                                            Large
                                                                        </option>
                                                                    </select>
                                                                </div>


                                                                <div class="col-12 form-group mb-3">
                                                                    <label for="label">target</label>
                                                                    <select name="target" id="target-link"
                                                                            data-media-global="target"
                                                                            class="form-control input-edit-medias">
                                                                        <option value="_blank"
                                                                                @if(isset($champ->target) && $champ->target == "_blank") selected @endif>
                                                                            _blank
                                                                        </option>
                                                                        <option value="_parent"
                                                                                @if(isset($champ->target) && $champ->target == "_parent") selected @endif>
                                                                            _parent
                                                                        </option>
                                                                        <option value="_self"
                                                                                @if(isset($champ->target) && $champ->target == "_self") selected @endif>
                                                                            _self
                                                                        </option>
                                                                    </select>
                                                                </div>


                                                                @include("webformulaire.editing.include.align",['item'=>$champ,'name'=>'position'])

                                                            </div>
                                                        </div>

                                                        <div id="wrap-list-media-edit">

                                                            @include("webformulaire.editing.include.list_edit_medias")

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach


    </div>

</div>
