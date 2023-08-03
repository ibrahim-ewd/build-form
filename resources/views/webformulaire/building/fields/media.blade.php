<fieldset class="col-12 my-10 scheduler-border p-2">
    <legend class="scheduler-border">{{__("fields.".Str::replace('_', ' ', $ele['elements'][0]).'_option')}}</legend>
    <div>

        <input type="hidden" value name="dfg" id="number_{{$key}}_indrop">

        <div id="Chump_{{$key}}" class="row">

        </div>

        <div id="formedit" class="row formedit_satisfaction ">
            <div class="col-12">
                <div class="row">

                    <div class="col-6 px-1 my-1">
                        <select  name="title" class="form-control" id="title_{{$key}}"  >
                            <option value="" >-- Slectioner un média --</option >
                            @foreach($ele['medias_name'] as $k=>$media)
                                <option value="{{$media}}" >{{$media}}</option >
                            @endforeach
                        </select>
                    </div>

                    <div class="col-5  px-1 my-1">
                        <input type="text" name="value" class="form-control" id="value_{{$key}}" value="0"
                               placeholder="href : https://www.exemple.com">
                    </div>
                </div>

                <div class="w-100 bg-dark  mt-3 ">
                    <button id="btn_addChumpRadio_{{$key}}" class="float-right btn btn-light-primary mr-2">Ajouter</button>
                    <button id="btn_EditChumpRadio_{{$key}}" style="display: none" class="float-right btn btn-light-primary mr-2">mettre à jour</button>
                    <button type="reset" id="btn_addChumpRadio" onclick="removeImagUpload('{{$key}}')" class="float-right btn btn-light-primary mr-2">supprimer</button>
                </div>
            </div>
        </div>
    </div>
</fieldset>

<fieldset class="col-12 my-10 scheduler-border p-2">
    <legend class="scheduler-border">{{__('fields.styles_fields')}}</legend>
    <div>

        <input type="hidden" value name="dfg" id="number_{{$key}}_indrop">

        <div id="" class="row  ">
            <div class="col-12">

                @include("webformulaire.building.fields.grids")

                <div class="form-group  mt-10">
                    <label>{{__('fields.size_media')}}</label>
                    <select  name="size" class="form-control style_form_group check_{{$key}}"
                             data-parent="{{$key}}" data-style="yes">
                        <option value="symbol-30" >Petit</option >
                        <option value="symbol-50" >Moyen</option >
                        <option value="symbol-70" >Grand</option >
                    </select >
                </div>

                <div class="form-group  mt-10">
                    <label>{{__('fields.float_media')}}</label>
                    <select  name="float" class="form-control style_form_group check_{{$key}}"
                             data-parent="{{$key}}" data-style="yes">
                        <option value="justify-content-start" >Gauche</option >
                        <option value="justify-content-center" >Centre</option >
                        <option value="justify-content-end" >Droit</option >
                    </select >
                </div>

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









