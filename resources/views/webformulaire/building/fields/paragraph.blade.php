
<fieldset class="col-12 my-10 scheduler-border p-2">
	<legend class="scheduler-border">Réglages</legend>
{{--	<div class="row">--}}
{{--		<label class="checkbox checkbox-outline col-12 checkbox-success checkbox-lg  mt-10">--}}
{{--			<input type="checkbox" class="check_obli" value="required"--}}
{{--			       data-parent="{{$key}}"   data-name="{{$ele['elements'][0]}}" >--}}
{{--			<span></span>--}}
{{--			&nbsp;--}}
{{--			Obligatoire--}}
{{--		</label>--}}
{{--	</div>--}}
	{{--</fieldset>--}}


	{{--<fieldset class="col-12 my-10 scheduler-border p-2">--}}
	{{--     <legend class="scheduler-border">Editer</legend>--}}
	<div id="formedit" class="row mt-10">
		@foreach($ele['elements'] as $ke=>$el)
			<div class=" text-capitalize col-12">
				<label for="">Teneur </label>
{{--				<input type="number" value="255" class="form-control check_{{$key}}"  name="{{$el}}" />--}}

			<textarea class="form-control check_{{$key}}"  name="{{$el}}" id="wf_edit_paragraph" style="max-height:250px;height:200px"></textarea>

			</div>
		@endforeach
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
