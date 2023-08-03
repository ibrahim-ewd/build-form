

<div class="feilds_formsEdit_Rules" data-id="{{$id}}" data-fields="{{ json_encode( $form['fields']) }}" data-conditions="{{$form['conditions']}}">

	<input type="hidden" id="cl_token" name="_token" value="{{ csrf_token() }}" />
	<div class="form-group row">
		<label class="col-form-label col-lg-12 col-sm-12">Nom : </label>
		<div class=" col-lg-12 col-md-12 col-sm-12">
			<input type="text"
			       name="name_conditional"
			       class="form-control cl_name_conditional"
			>
		</div>
		<div class="col-8 separator separator-solid mt-8 mb-5"></div>
	</div>

	{{--    <fieldset class="col-12 scheduler-border fieldset_condition_logique p-2">--}}
	{{--        <legend class="scheduler-border">Logics conditional</legend>--}}
	<div>
		<div   class="my-10">
			<div id="cl_formedit">
				<form class="cl_form">
					<div class="form-group row">
						<label class="col-form-label  col-lg-3 col-sm-12">Si : </label>
						<div class=" col-lg-8 col-md-12 col-sm-12">
							<select name="if_fields" class="form-control cl_field_conditions cl_if_fields form-control-sm" id="">
								@foreach($form['fields'] as $field)
									@if($field['typeChamp']=="multiple" || $field['typeChamp']=="menuderoulant" || $field['typeChamp']=="caseacocher")
										<option value="{{$field['fieldId']}}">{{$field['name_group']}}</option>
									@endif
								@endforeach
							</select >
						</div>
					</div>

					<div class="form-group row">
						<label class="col-form-label  col-lg-3 col-sm-12"></label>

						<div class=" col-lg-8 col-md-12 col-sm-12">
							<select name="has_action" class="form-control cl_field_conditions cl_has_action form-control-sm" id="">
								<option value="is" >est</option >
{{--								<option value="is_not" >n'est pas</option >--}}
{{--								<option value="is_empty" >est vide</option >--}}
{{--								<option value="is_not_empty" >n'est pas vide</option >--}}
							</select >
						</div>
					</div>

					<div class="form-group row equals-group-default" >
						<label class="col-form-label  col-lg-3 col-sm-12"></label>

						<div class=" col-lg-8 col-md-12 col-sm-12 cl_equals_parent">
							<select name="equals"  class="form-control cl_field_conditions cl_equals form-control-sm" id="">
							</select >
						</div>
					</div>

					<div class="form-group row equals-group-caseacocher d-none" >
						<label class="col-form-label  col-lg-3 col-sm-12"></label>

						<div class=" col-lg-8 col-md-12 col-sm-12 cl_equals_parent">

{{--							<select name="equals"  class="form-control cl_field_conditions cl_equals form-control-sm selectpicker" multiple="multiple" id="">--}}
{{--							</select >--}}
						</div>
					</div>

					<div class="form-group row">
						<label class="col-form-label  col-lg-3 col-sm-12">Alors : </label>
						<div class=" col-lg-8 col-md-12 col-sm-12">
							<select name="field_condition"  class="form-control cl_field_conditions cl_condition_field form-control-sm" id="">
								@foreach($form['fields'] as $field)
{{--									@if($field['typeChamp']!="multiple")--}}
										<option value="{{$field['fieldId']}}">{{$field['name_group']}}</option>
{{--									@endif--}}
								@endforeach
							</select >
						</div>
					</div>

					<div class="form-group row">
						<label class="col-form-label  col-lg-3 col-sm-12">Égal : </label>
						<div class=" col-lg-8 col-md-12 col-sm-12">
							<select name="action_condition"  class="form-control cl_field_conditions cl_action_condition form-control-sm" id="">
								<option value="show" >Afficher</option >
								<option value="hide" >Cacher</option >
							</select >
						</div>
					</div>

				</form>
				<div class="form-group row">
					<label class="col-form-label col-lg-3 col-sm-12"></label>
					<div class=" col-lg-8 col-md-12 col-sm-12">
						<button type="submit" value="{{$id}}"  id="kt_btn_1" class=" cl_btn_add_update float-right btn btn-light-primary mr-2"
						        onclick="addConditional(this)">
							Ajouter condition
						</button>
					</div>
				</div>
				{{--                        </fieldset>--}}
			</div>
		</div>
	</div>
	{{--    </fieldset>--}}


</div>



<div class="cl-tab-content" id="cl_myTabContent">

</div>
