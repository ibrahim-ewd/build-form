
<div id="accordion">

	<div class="accordion accordion-toggle-arrow" id="accordionExample1">


        <div class="card">

            <div class="card-header">
                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOneform">
                    Formulaire
                </div>
            </div>

            <div id="collapseOneform" class="collapse " data-parent="#accordionExample1">
                <div class="card-body">
                    <div class="example-tools">
                        <div class="form-group">
                            <label for="selec" class="row">
                                <span class="col-4"> Background type : </span>

                                <div class="col-8">
                                    <select name="formStyle[background_type]" id="selecBgType" class="w-100 form-control" onchange="switchToTransparent(this) ">
                                        <option @if(isset(json_decode($form['styles'])->formStyle->background_type) && json_decode($form['styles'])->formStyle->background_type == 'transparent') selected @endif value="transparent">transparent</option>
                                        <option @if(isset(json_decode($form['styles'])->formStyle->background_type) && json_decode($form['styles'])->formStyle->background_type == 'color') selected @endif value="color">color</option>
                                        <option @if(isset(json_decode($form['styles'])->formStyle->background_type) && json_decode($form['styles'])->formStyle->background_type == 'image') selected @endif value="image">image</option>
                                    </select>
                                </div>

                            </label>
                        </div>

                        <div class="form-group bg_ColImg">
                            <label for="background_color__general-form" class="row">
                                <span class="col-4"> Background : </span>
                                <div class="col-8">
                                    <input type="color"
                                           name="formStyle[background_color]"
                                           class="form-control  EditApparence "
                                           value="{{json_decode($form['styles'])->formStyle->background_color??'#ffffff'}}"
                                           id="background__general-form"
                                           oninput="updateStyleBackground('general-form')" />
                                </div>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="color__general-form" class="row align-items-center">
                                <span class="col-4"> Couleur : </span>

                                <input type="color"
                                       name="formStyle[color]"
                                       class="form-control col-8 EditApparence "
                                       id="color__general-form"

                                       value="{{json_decode($form['styles'])->formStyle->color??'#000'}}"
                                       oninput="updateStyleColor('general-form')"
                                >

                            </label>
                        </div>


                        <div class="form-group">
                            <label for="padding__general-form" class="row">
                                <span class="col-4 have-dropdown"> Padding : </span>
                                <div class="col-8 row">
                                    <div class="position-relative p-0 col-6  px-1 ">
                                        <sub>Haut</sub>

                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   name="formStyle[padding_top]"
                                                   class="form-control EditApparence  "
                                                   min="0"
                                                   value="{{json_decode($form['styles'])->formStyle->padding_top??15}}"
                                                   id="padding_top__general-form"
                                                   oninput="updateStyleDimension('general-form')"
                                            />
                                            <div class="input-group-append"><span class="input-group-text">px</span></div>
                                        </div>
                                    </div>
                                    <div class="position-relative p-0 col-6 px-1 ">
                                        <sub>Bas</sub>
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   name="formStyle[padding_bottom]"
                                                   class="form-control EditApparence  "
                                                   min="0"
                                                   value="{{json_decode($form['styles'])->formStyle->padding_bottom??15}}"
                                                   id="padding_bottom__general-form"
                                                   oninput="updateStyleDimension('general-form')"
                                            />
                                            <div class="input-group-append"><span class="input-group-text">px</span></div>
                                        </div>
                                    </div>
                                    <div class="position-relative p-0 col-6  px-1 ">
                                        <sub>Gauche</sub>

                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   name="formStyle[padding_left]"
                                                   class="form-control EditApparence  "
                                                   min="0"
                                                   value="{{json_decode($form['styles'])->formStyle->padding_left??15}}"
                                                   id="padding_left__general-form"
                                                   oninput="updateStyleDimension('general-form')"
                                            />
                                            <div class="input-group-append"><span class="input-group-text">px</span></div>
                                        </div>
                                    </div>
                                    <div class="position-relative p-0 col-6  px-1 ">
                                        <sub>Droit</sub>
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   name="formStyle[padding_right]"
                                                   class="form-control EditApparence  "
                                                   min="0"
                                                   value="{{json_decode($form['styles'])->formStyle->padding_right??15}}"
                                                   id="padding_right__general-form"
                                                   oninput="updateStyleDimension('general-form')"
                                            />
                                            <div class="input-group-append"><span class="input-group-text">px</span></div>
                                        </div>
                                    </div>
                                </div>


                            </label>
                        </div>

                        <div class="form-group">
                            <label for="margin__general-form" class="row">
                                <span class="col-4 have-dropdown"> Margin : </span>
                                <div class="col-8 row">
                                    <div class="position-relative p-0 col-6  p-1 ">
                                        <sub>Haut</sub>
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   name="formStyle[margin_top]"
                                                   class="form-control EditApparence  "
                                                   min="0"
                                                   value="{{json_decode($form['styles'])->formStyle->margin_top??0}}"
                                                   id="margin_top__general-form"
                                                   oninput="updateStyleDimension('general-form')"
                                            />
                                            <div class="input-group-append"><span class="input-group-text">px</span></div>
                                        </div>
                                    </div>
                                    <div class="position-relative p-0 col-6 p-1 ">
                                        <sub>Bas</sub>
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   name="formStyle[margin_bottom]"
                                                   class="form-control EditApparence  "
                                                   min="0"
                                                   value="{{json_decode($form['styles'])->formStyle->margin_bottom??0}}"
                                                   id="margin_bottom__general-form"
                                                   oninput="updateStyleDimension('general-form')"
                                            />
                                            <div class="input-group-append"><span class="input-group-text">px</span></div>
                                        </div>
                                    </div>
                                    <div class="position-relative p-0 col-6  p-1 ">
                                        <sub>Gauche</sub>
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   name="formStyle[margin_left]"
                                                   class="form-control EditApparence  "
                                                   min="0"
                                                   value="{{json_decode($form['styles'])->formStyle->margin_left??0}}"
                                                   id="margin_left__general-form"
                                                   oninput="updateStyleDimension('general-form')"
                                            />
                                            <div class="input-group-append"><span class="input-group-text">px</span></div>
                                        </div>
                                    </div>
                                    <div class="position-relative p-0 col-6  p-1 ">
                                        <sub>Droit</sub>
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   name="formStyle[margin_right]"
                                                   class="form-control EditApparence  "
                                                   min="0"
                                                   value="{{json_decode($form['styles'])->formStyle->margin_right??0}}"
                                                   id="margin_right__general-form"
                                                   oninput="updateStyleDimension('general-form')"
                                            />
                                            <div class="input-group-append"><span class="input-group-text">px</span></div>
                                        </div>
                                    </div>
                                </div>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		@foreach(\App\Models\Appearance::APPARENCEFIELDS as $key=>$value )

			<div class="card">
				<div class="card-header">
					<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne{{$key}}">
						{{$value['title']}}
					</div>
				</div>
				<div id="collapseOne{{$key}}" class="collapse " data-parent="#accordionExample1">
					<div class="card-body">
						<div class="example-tools">

                            <fieldset class="col-12 my-10 scheduler-border-top p-2">
                                <legend class="scheduler-border">Décorations</legend>


                                @if(isset($value['colors']) && isset($value['colors']['background-color']))
                                    @include('webformulaire.appearance.include.background_color')
                                @endif

                                @if(isset($value['colors']) && isset($value['colors']['color']))
                                   @include('webformulaire.appearance.include.color')
                                @endif

                            </fieldset>

                            <fieldset class="col-12 my-10 scheduler-border-top p-2">

                                @if(isset($value['fontSize']) || isset($value['fontFamily']) || isset($value['fontWeight']))
                                    <legend class="scheduler-border">Typographie</legend>
                                @endif

                                @if(isset($value['fontSize']))
                                    @include('webformulaire.appearance.include.fontSize')
                                @endif

                                @if(isset($value['fontFamily']))
                                        @include('webformulaire.appearance.include.fontFamily')
                                @endif

                                @if(isset($value['fontWeight']))
                                     @include('webformulaire.appearance.include.fontWeight')
                                 @endif

                            </fieldset>

                            <fieldset class="col-12 my-10 scheduler-border-top p-2">
                                @if(isset($value['dimension']))
                                    <legend class="scheduler-border">Dimensions</legend>
                                @endif


                                @if( isset($value['dimension']) && isset($value['dimension']['width']))
                                        @include('webformulaire.appearance.include.width')
                                @endif

                                @if( isset($value['dimension']) && isset($value['dimension']['height']))
                                        @include('webformulaire.appearance.include.height')
                                @endif

                                @if( isset($value['dimension']) && isset($value['dimension']['margin']))
                                        @include('webformulaire.appearance.include.margin')
                                @endif

                                @if(isset($value['dimension']) && isset($value['dimension']['padding']))
                                        @include('webformulaire.appearance.include.padding')
                                @endif

                                @if(isset($value['dimension']) && isset($value['dimension']['textAlign']))
                                        @include('webformulaire.appearance.include.textAlign')
                                @endif
                            </fieldset>

						</div>
					</div>
				</div>
			</div>

		@endforeach



		<div class="card">
			<div class="card-header">
				<div class="card-title collapsed" data-toggle="collapse" data-target="#choix_un_template">
					Choix un template
				</div>
			</div>
			<div id="choix_un_template" class="collapse" data-parent="#accordionExample1">
				<div class="card-body">
					<div class="example-tools">
						<div class="form-group">
							<label for="fontSelect__template-{{$id}}" class="row" >
								<span class="col-4"> Templates : </span>
								<select id="template_forms"
								        name="template"
								        class="form-control col-8" >
									@foreach ($templates as $val => $font)
										<option value="{{$font[1]}}/{{$val}}"
										        data-type="{{$font[1]}}"
											{{ ($val == explode('/',$form['template']??'/default')[1]) ? 'selected' : '' }}>
											{{$font[0]}}
										</option>
									@endforeach
								</select>
							</label >
						</div>
					</div>

					<div class="ConfigurationStepper form-group_description mt-5 pr-5" style="display:none">

						<h4 class="my-5">Configuration de stepper</h4>

						<div class="card-toolbar">

							<div class="example-tools">
								<div class="form-group">
									<label for="fontSelect_steper_{{$id}}" class="row" >
										<span class="col-4"> Number de step : </span>
										<input type="number" max="{{count($form['fields'])}}"  id="fontSelect_{{$id}}"
										       value="{{count($steppers)>0 ? count($steppers) : count($form['fields'])}}" class="InputStepNumber form-control col-8"   >
									</label >
								</div>

								<hr >

								<div class="form-group seclectStep"  data-list='{{json_encode($list_steppers)}}' data-step="{{ json_encode($data_step)}}">

								</div>
							</div>

						</div>
					</div>


				</div>
			</div>
		</div>
	</div>





</div>
