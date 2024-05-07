<div class="accordion" id="accordion{{$nameChamp}}">


    @foreach($data->champ as $key=>$champ)

        <div class="accordion-item field-edit" id="field-{{$nameChamp}}-{{$key}}" data-name="{{$key}}"
             data-index="{{$index}}">

            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button text-capitalize" type="button" data-bs-toggle="collapse"
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

                            <div class="row">
                                <div class="col-11">
                                    <div class="col-11 mx-3 my-1 parent_list_option table table-hover">
                                        <div class="row-edit-option">
                                            <span>Titles</span>
                                            <span>Values</span>
                                            <span><div class="btn btn-primary btn-options-plus"><i
                                                        class="cursor-pointer fa fa-plus"></i></div></span>
                                        </div>
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


    @if(isset($data->display_label))
        <div class="field-edit" data-index="{{$index}}">
            <div class="form-group my-3">
                <label for="display_label">Display labels</label>
                <div class="toggle-button-cover">
                    <div id="visibility_{{$nameChamp}}" class="button-3 button r">

                        <input
                            type="checkbox"
                            name="display_label"
                            data-type="boolean"
                            {{($data->display_label==true) ?'checked':''}}
                            class="checkbox input-edit-form-global " data-edit="global" value="" id="display_label">
                        <div class="knobs"></div>
                        <div class="layer"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>

{{--<script>--}}
{{--    ClassicEditor--}}
{{--        .create(document.querySelector('#value_ckedit'))--}}
{{--        .catch(error => {--}}
{{--            console.error(error);--}}
{{--        });--}}
{{--</script>--}}


