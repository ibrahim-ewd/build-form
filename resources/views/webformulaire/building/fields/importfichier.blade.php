

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

	<div>
		<input type="hidden" value name="dfg" id="number_{{$ele['elements'][0]}}_indrop">
		<div id="formedit" class="row my-10">
			<div class="col-12">
				<div class="row">

					<div class="col-12 px-1 my-3  my-1">
						<label for="Extension_autorisees text-capitalize">Extension autorisées</label>
						<select data-parent="{{$key}}"
						        title="saisie (par ex .jpeg,.pdf…)"
						        value=""
						        name="extension" class="form-control check_{{$ele['elements'][0]}}"
						        id="Extension_autorisees" placeholder="Extension autorisées">

							<option value="image/png"  >png</option>
							<option value="image/jpeg"  >jpg</option>
							<option value=".pdf"  >pdf</option>
							<option value="image/tiff"  >tiff</option>
							<option value="image/gif"  >gif</option>
							<option value="image/webp"  >webp</option>
							<option value="application/pdf"  >webp</option>
							<option value=".csv"  >.csv</option>
							<option value="application/vnd.ms-excel"  >excel</option>
						</select>
						<p class="notif text-muted"><em >saisie (par ex .jpeg, .pdf …)</em>. <span class="text-danger"></span> </p>

					</div>

					<div class="col-12  px-1 my-3 my-1">
						<label for="Taille_max text-capitalize">Taille max </label>
						<input type="text" data-parent="{{$ele['elements'][0]}}" title="saisie en Ko" name="max_size" class="form-control check_{{$ele['elements'][0]}}" id="Taille_max" value="" placeholder="Taille max">
						<p class="notif text-muted"><em >saisie en Ko</em>. <span class="text-danger"></span> </p>

					</div>

					<div class="col-12  px-1  my-3 my-1">
						<label for="Nombre_fichiers  text-capitalize">Nombre de fichiers  </label>
						<input type="text" data-parent="{{$key}}" name="numberFicher" class="form-control check_{{$ele['elements'][0]}}" id="Nombre_fichiers" value="" placeholder="Nombre de fichiers">
					</div>

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
