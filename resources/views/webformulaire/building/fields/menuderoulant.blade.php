
<div>

    <input type="hidden" value name="dfg" id="number_{{$ele['elements'][0]}}_indrop">

    @if( $ele['elements'][0] =="satisfaction")
        <div class="row my-15">
            <label for="Nombre_curseur">Nombre de curseurs sur l’échelle</label>
            <div class="col-12 px-1 my-1">
                <input type="number" min="0" max="10" value="5"
                       data-parent="{{$key}}"
                       class="form-control check_{{$ele['elements'][0]}}"  id="Nombre_curseur"  >
            </div>
        </div>

        <div class="row my-15">
            <label class="radio radio-outline radio-success radio-lg col-4  ">
                <input type="radio" value="star" class="check_type_satisfaction "
                       data-name="{{$ele['elements'][0]}}"
                       data-parent="{{$key}}"
                       data-class="{{$el}}"
                       {{--                                           @if($form['fields'][0]['type_elements']=="star") checked="checked" @endif--}}
                       name= "type_elements" />
                <span></span>
                &nbsp; Étoile
            </label>

            <label class="radio radio-outline radio-success radio-lg  col-4  ">
                <input type="radio" value="text" class="check_type_satisfaction"
                       data-name="{{$ele['elements'][0]}}"
                       data-parent="{{$key}}"
                       data-class="{{$el}}"
                       {{--                                           @if($form['fields'][0]['type_elements']=="text") checked @endif--}}
                       name= "type_elements" />
                <span></span>
                &nbsp; Text
            </label>

            <label class="radio radio-outline radio-success radio-lg  col-4   ">
                <input type="radio" value="default" class="check_type_satisfaction"
                       data-name="{{$ele['elements'][0]}}"
                       data-parent="{{$key}}"
                       data-class="{{$el}}"
                       {{--                                           @if($form['fields'][0]['type_elements']=="default") checked @endif--}}

                       name= "type_elements" />
                <span></span>
                &nbsp; Défaut
            </label>
        </div>


    @endif


    <div id="Chump_{{$ele['elements'][0]}}" class="row">

    </div>


    <div id="formedit" class="row formedit_satisfaction
                                @if(isset($form['fields'][0]['type_elements']) && $form['fields'][0]['type_elements']!="text") d-none @endif">
        <div class="col-12">
            <div class="row">
                <div class="col-6 px-1 my-1">
                    <input type="text" name="title" class="form-control" id="title_{{$ele['elements'][0]}}" placeholder="titre d'option" >
                </div>

                @if( $ele['elements'][0]!="satisfaction")
                    <div class="col-1 p-0 my-1">
                        <label class="btn   btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" style="overflow: hidden" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                            <i class="flaticon-upload text-dark icon-lg uploadicon" ></i>
                            <img id="fileip1preview_{{$ele['elements'][0]}}" class="w-100">

                            <input type="file" name="image_todo" style="display:none"  id="image_{{$ele['elements'][0]}}" onchange="showPreview_(event,'{{$ele['elements'][0]}}')"   accept=".png, .jpg, .jpeg">
                        </label>
                    </div>
                @endif
                <div class="col-5  px-1 my-1">
                    <input type="text" name="value" class="form-control" id="value_{{$ele['elements'][0]}}" value="0" placeholder="valeur d'option">
                </div>
            </div>
            @if( $ele['elements'][0]=="satisfaction")
                <div class="w-100 bg-dark  mt-3 ">
                    <button id="btn_addChumpRadio_{{$ele['elements'][0]}}" class="float-right btn btn-light-primary mr-2">Ajouter</button>
                    <button id="btn_EditChumpRadio_{{$ele['elements'][0]}}" style="" class="float-right btn btn-light-primary mr-2">mettre à jour</button>
                    <button type="reset" id="btn_addChumpRadio" onclick="removeImagUpload('{{$ele['elements'][0]}}')" class="float-right btn btn-light-primary mr-2">supprimer</button>
                </div>
            @else
                <div class="w-100 bg-dark  mt-3 ">
                    <button id="btn_addChumpRadio_{{$ele['elements'][0]}}" class="float-right btn btn-light-primary mr-2">Ajouter</button>
                    <button id="btn_EditChumpRadio_{{$ele['elements'][0]}}" style="display: none" class="float-right btn btn-light-primary mr-2">mettre à jour</button>
                    <button type="reset" id="btn_addChumpRadio" onclick="removeImagUpload('{{$ele['elements'][0]}}')" class="float-right btn btn-light-primary mr-2">supprimer</button>
                </div>
            @endif
            {{--                                    End if not satisfaction--}}
        </div>
    </div>
</div>







<fieldset class="col-12 my-10 scheduler-border p-2">
    <legend class="scheduler-border">{{__('fields.styles_fields')}}</legend>
    <div>

        <input type="hidden" value name="dfg" id="number_{{$ele['elements'][0]}}_indrop">

        <div id="" class="row  ">
            <div class="col-12">
                @include("webformulaire.building.fields.grids")
            </div>
        </div>
    </div>




    <div class="row">
        <label class="checkbox checkbox-outline  checkbox-success checkbox-lg col-12">
            <input type="checkbox" class="btn_visible_title"  data-name="{{$key}}" />
            <span></span>
            &nbsp; Title visible
        </label>
    </div>

</fieldset>
