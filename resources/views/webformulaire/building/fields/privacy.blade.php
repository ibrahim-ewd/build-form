<fieldset class="col-12 my-10 scheduler-border p-2">
    <legend class="scheduler-border">Réglages</legend>
    <div class="row">
        <label class="checkbox checkbox-outline col-12  checkbox-success checkbox-lg  mt-10">
            <input type="checkbox" class="check_obli" value="required"
                   data-parent="{{$key}}"   data-name="{{$ele['elements'][0]}}" >
            <span></span>
            &nbsp;
            Obligatoire
        </label>
    </div>
{{--</fieldset>--}}


{{--<fieldset class="col-12 my-10 scheduler-border p-2">--}}
{{--    <legend class="scheduler-border">Edter </legend>--}}
        <div id="formedit" class="row mt-10">
            <input type="hidden" value name="dfg" id="number_{{$ele['elements'][0]}}_indrop">

            <div class="col-12">
                <div class="row">

                    <div class="col-12 px-1 my-5">
                        <label for="title_privacy  text-capitalize">Titre privacy</label>
                        <input type="text" data-parent="privacy" name="text" class="form-control check_privacy"  id="title_privacy" placeholder="titre privacy" >
                    </div>

{{--                    <div class="col-12  px-1 my-5">--}}
{{--                        <label for="value_privacy text-capitalize">description privacy</label>--}}

{{--                        <input type="text"  data-parent="privacy" name="description" class="form-control check_privacy" id="value_privacy" value="" placeholder="description privacy">--}}
{{--                    </div>--}}

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
