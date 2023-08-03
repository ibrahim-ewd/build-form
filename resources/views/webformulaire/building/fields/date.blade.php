
<fieldset class="col-12 my-10 scheduler-border p-2">
    <legend class="scheduler-border">Réglages</legend>
    <div class="row">
        <label class="checkbox checkbox-outline col-12 checkbox-success checkbox-lg  mt-10">
            <input type="checkbox" class="check_obli" value="required"
                   data-parent="{{$key}}"   data-name="{{$ele['elements'][0]}}" >
            <span></span>
            &nbsp;
            Obligatoire
        </label>
    </div>
{{--</fieldset>--}}

    <fieldset class="col-12 mt-10 scheduler-border-50 p-2">
        <legend class="scheduler-border-50">Type {{$ele['elements'][0]}}</legend>
        <div id="formedit" class="row">
            <input type="hidden" value name="dfg" id="number_date_indrop">

        @foreach($ele['type_elements'] as $ke=>$el)
                <div class="col-lg-6 col-12 ">
                    <label class="radio radio-outline radio-success radio-lg  mt-10  ">
                        <input type="radio" value="{{$el}}" class="check_{{$key}} date_{{$el}}"
                               data-name="{{$ele['elements'][0]}}"
                               data-parent="{{$key}}"
                               data-class="{{$el}}"
                               name= "type_elements" />
                        <span></span>
                        &nbsp; {{Str::replace('_', ' ', ucfirst($el))}}
                    </label>
                </div>
            @endforeach
            <div id="typeDatederoulante" style="display:none" class="row">
                <div class=" col-12 typeDatederoulante">
                    <label class="radio radio-outline radio-success radio-lg  mt-10">
                        <select name="" id="typeDatederoulante_select" class="form-control">
                            <optgroup label="/">
                                <option value="dmy_slash">dd/mm/yyyyy</option>
                                <option value="mdy_slash">mm/dd/yyyyy</option>
                                <option value="ymd_slash">yyyyy/mm/dd</option>
                            </optgroup>
                            <optgroup label="-">
                                <option value="dmy_hyphen">dd-mm-yyyyy</option>
                                <option value="mdy_hyphen">mm-dd-yyyyy</option>
                                <option value="ymd_hyphen">yyyyy-mm-dd</option>
                            </optgroup>
                            <optgroup label=".">
                                <option value="dmy_point">dd.mm.yyyyy</option>
                                <option value="mdy_point">mm.dd.yyyyy</option>
                                <option value="ymd_point">yyyyy.mm.dd</option>
                            </optgroup>

                        </select>
                    </label>
                </div>
            </div>

        </div>
    </fieldset>

</fieldset>
{{--<div>--}}
{{--    <input type="hidden" value name="dfg" id="number_date_indrop">--}}
{{--    <div id="formedit" class="row">--}}
{{--        @foreach($ele['type_elements'] as $ke=>$el)--}}
{{--            <div class="col-lg-6 col-12 ">--}}
{{--                <label class="radio radio-outline radio-success radio-lg  mt-10  ">--}}
{{--                    <input type="radio" value="{{$el}}" class="check_{{$key}} date_{{$el}}"--}}
{{--                           data-name="{{$ele['elements'][0]}}"--}}
{{--                           data-parent="{{$key}}"--}}
{{--                           data-class="{{$el}}"--}}
{{--                           name= "type_elements" />--}}
{{--                    <span></span>--}}
{{--                    &nbsp; {{Str::replace('_', ' ', ucfirst($el))}}--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--        <div id="typeDatederoulante" style="display:none" class="row">--}}
{{--            <div class=" col-12 typeDatederoulante">--}}
{{--                <label class="radio radio-outline radio-success radio-lg  mt-10">--}}
{{--                    <select name="" id="typeDatederoulante_select" class="form-control">--}}
{{--                        <optgroup label="/">--}}
{{--                            <option value="dmy_slash">dd/mm/yyyyy</option>--}}
{{--                            <option value="mdy_slash">mm/dd/yyyyy</option>--}}
{{--                            <option value="ymd_slash">yyyyy/mm/dd</option>--}}
{{--                        </optgroup>--}}
{{--                        <optgroup label="-">--}}
{{--                            <option value="dmy_hyphen">dd-mm-yyyyy</option>--}}
{{--                            <option value="mdy_hyphen">mm-dd-yyyyy</option>--}}
{{--                            <option value="ymd_hyphen">yyyyy-mm-dd</option>--}}
{{--                        </optgroup>--}}
{{--                        <optgroup label=".">--}}
{{--                            <option value="dmy_point">dd.mm.yyyyy</option>--}}
{{--                            <option value="mdy_point">mm.dd.yyyyy</option>--}}
{{--                            <option value="ymd_point">yyyyy.mm.dd</option>--}}
{{--                        </optgroup>--}}

{{--                    </select>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
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
