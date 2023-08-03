
<fieldset class="col-12 my-10 scheduler-border p-2">
		<legend class="scheduler-border">Réglages</legend>

	@foreach($ele['elements'] as $ke=>$el)

		<fieldset class="col-12 my-10 scheduler-border-50 p-2">
			<legend class="scheduler-border-50">{{__("fields.".Str::replace('_', ' ', $el))}}</legend>
			<div class="row">

                <div class="form-group col-lg-12 col-12 mt-10">
                    <label for="">Placeholder : </label>
                    <input type="text" class="form-control print_placeholder"   data-parent="{{$key}}"  data-name="{{$el}}"   name="placeholder" />
                </div>


                <label class="checkbox checkbox-outline  checkbox-success checkbox-lg col-lg-6 col-12">
                    <input type="checkbox" class="check_{{$key}}"  name="{{$el}}" />
                    <span></span>
                    &nbsp; Visible
                </label>

                <label class="checkbox checkbox-outline  checkbox-success checkbox-lg">
                    <input type="checkbox" class="check_champ_obligatiore" value="required"
                        data-parent="{{$key}}"   data-name="{{$el}}" >
                    <span></span>
                    &nbsp;
                    Obligatoire
                </label>

			</div>
		</fieldset>
	@endforeach
	</fieldset>



	<fieldset class="col-12 my-10 scheduler-border p-2">
		<legend class="scheduler-border">{{__("Styles")}}</legend>

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

