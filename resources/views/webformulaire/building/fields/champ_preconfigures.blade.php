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
</fieldset>

<fieldset class="col-12 my-10 scheduler-border p-2">
	<legend class="scheduler-border">{{__('fields.styles_fields')}}</legend>
	<div>

		<input type="hidden" value name="dfg" id="number_{{$key}}_indrop">

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
