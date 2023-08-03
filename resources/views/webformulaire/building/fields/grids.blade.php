
<div class="form-group  mt-10">
    <label>{{__('fields.grilles')}}</label>

    <select  name="grid" data-style="yes" class="form-control style_form_group check_{{$key}}" data-parent="{{$key}}">
        <option value="12"  >   1/1 </option >
        <option value="6"   >   1/2 </option >
        <option value="4"   >   1/3 </option >
        <option value="3"   >   1/4 </option >
        <option value="8"   >   2/3 </option >
    </select >
</div>

{{--<div class="groupGrids_{{$key}} row mt-20">--}}
{{--    <h5>Styles </h5>--}}
{{--    <fieldset class="col-12 my-10 scheduler-border p-2">--}}
{{--        <legend class="scheduler-border">Grilles</legend>--}}
{{--        <div class="row">--}}
{{--            <label class="radio radio-outline  radio-success radio-lg col-lg-6 col-12 mt-10">--}}
{{--                <input type="radio" value="12" class="check__champ_grids"--}}
{{--                       data-parent="{{$key}}"--}}
{{--                       name="{{$ele['elements'][0]}}" />--}}
{{--                <span></span>--}}
{{--                &nbsp; 1/1--}}
{{--            </label>--}}
{{--            <label class="radio radio-outline  radio-success radio-lg col-lg-6 col-12 mt-10">--}}
{{--                <input type="radio" value="6" class="check__champ_grids"--}}
{{--                       data-parent="{{$key}}"  name="{{$ele['elements'][0]}}" />--}}
{{--                <span></span>--}}
{{--                &nbsp; 1/2--}}
{{--            </label>--}}
{{--            <label class="radio radio-outline  radio-success radio-lg col-lg-6 col-12 mt-10">--}}
{{--                <input type="radio" value="3" class="check__champ_grids"--}}
{{--                       data-parent="{{$key}}"  name="{{$ele['elements'][0]}}" />--}}
{{--                <span></span>--}}
{{--                &nbsp; 1/4--}}
{{--            </label>--}}
{{--            <label class="radio radio-outline  radio-success radio-lg col-lg-6 col-12 mt-10">--}}
{{--                <input type="radio" value="4" class="check__champ_grids"--}}
{{--                       data-parent="{{$key}}"  name="{{$ele['elements'][0]}}" />--}}
{{--                <span></span>--}}
{{--                &nbsp; 1/3--}}
{{--            </label>--}}
{{--            <label class="radio radio-outline  radio-success radio-lg col-lg-6 col-12 mt-10">--}}
{{--                <input type="radio" value="8" class="check__champ_grids"--}}
{{--                       data-parent="{{$key}}"  name="{{$ele['elements'][0]}}" />--}}
{{--                <span></span>--}}
{{--                &nbsp; 2/3--}}
{{--            </label>--}}
{{--            --}}
{{--        </div>--}}
{{--    </fieldset>--}}
{{--</div>--}}
