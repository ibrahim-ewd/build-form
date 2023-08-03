<fieldset class="col-12 my-10 scheduler-border p-2">
    <legend class="scheduler-border">Réglages</legend>
{{--</fieldset>--}}


{{--<fieldset class="col-12 my-10 scheduler-border p-2">--}}
{{--    <legend class="scheduler-border">Edter </legend>--}}
        <div id="formedit" class="row mt-10">
            <input type="hidden" value name="dfg" id="number_{{$ele['elements'][0]}}_indrop">

            <div class="col-12">
                <div class="row">

                    <div class="col-12 px-1 my-5">
                        <label for="title_button  text-capitalize">Titre</label>
                        <input type="text" data-parent="button" data-parent="{{$key}}" data-name="value" name="value" class="form-control check_button value_of_btn"
                               value="Envoyer"
                               id="title_button" placeholder="Titre button" >
                    </div>
                </div>
            </div>
        </div>

        <div id="formedit" class="row mt-1">
            <input type="hidden" value name="dfg" id="number_{{$ele['elements'][0]}}_indrop">

            <div class="col-12">
                <div class="row">

                    <div class="col-12 px-1 my-5">
                        <label for="link_button  text-capitalize">Lien</label>
                        <input type="text" data-parent="button" data-name="link" data-parent="{{$key}}" name="link" class="form-control check_button link_of_btn"
                               value=""
                               id="link_button" placeholder="Lien" >
                    </div>
                </div>
            </div>
        </div>

</fieldset>




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
