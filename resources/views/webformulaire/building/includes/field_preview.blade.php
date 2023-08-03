@if(isset($form['fields']))

        @foreach ($form['fields'] as $order=> $f)

                <div class="fieldsForm
                     @if(isset($f['attributes'])) col-lg-{{json_decode($f['attributes'])->grid??''}}  @endif
                     col-12">
                    <h4 class="head-group">

                        <span class="name_group"
                            @if(isset(json_decode($f['conditions'])[0]->titleVisible) && json_decode($f['conditions'])[0]->titleVisible == false)
                                style="opacity: .75"
                            @endif
                        >  {{$f['name_group']}} </span>


                        @if(!isset($ispreview) && $current_rout != "webformulaire.rules")
{{--                              {{$ispreview}}--}}
                            <a data-toggle="tab"
                               href="#kt_tab_pane_2"
                               data-name="{{$f['typeChamp'] }}"
                               class="edit_{{$f['typeChamp'] }}_btn p-0 mx-3 order_field"
                               data-index="0"
                               data-position="{{$f['Data_duplicate'] }}"
                            >
                                @include('layouts.icons.settings')
                            </a>

                            <!--  delete button  -->
                            <a data-name="{{$f['typeChamp'] }}"
                               data-id="{{$f['id']}}"
                               onclick="deletChump(this)"
                               class="mx-3 cursor-pointer deleted_{{$f['typeChamp'] }}_btn deletedBtn_"
                               data-index="0"
                               data-fieldId="{{$f['fieldId']}}"
                               data-position="{{$f['Data_duplicate'] }}"
                            >
                                 @include('layouts.icons.delete')

                            </a>

                            <!--  duplicate button  -->
                            <a data-toggle="tab"
                               href="#"
                               data-name="{{$f['typeChamp'] }}"
                               class="duplicated_${type[1]}_btn duplicatedBtn_"
                               data-index="0"
                               data-position="0"
                               onclick="duplicateThis(event, this)"
                            >
                                @include('layouts.icons.duplicate')
                            </a>

                        @endif
                    </h4>

                    <div class="row Element_{{$f['typeChamp']}}" id="Elementmcd">

{{--                        {{dd($f['button'])}}--}}
                    @foreach($all_champ['champ'] as $k=>$ele)
{{--                      {{dump($ele)}}--}}
                        @if(isset($f[$ele])   )

                            @if($ele=="paragraphe" )
                                 <!-- Paragraph -->
                                      <?php $star = $f['obligatior']=='required'?"*":"" ?>

                                <div class="form-group col-12 child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                     <p>
                                          {{$f['type_elements']??"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam delectus deserunt dolore doloremque harum nam provident quaerat quas quis rem. Commodi error est magnam, nesciunt nihil nobis optio praesentium repudiandae."}}
                                     </p>
    {{--                          <textarea name="" id="" style="height:100px"--}}
    {{--                              placeholder="{{Str::ucfirst($f[$ele]).' '.$star}} " cols="30" class=" w-100 form-control"--}}
    {{--                          ></textarea>--}}
                                </div>

                             <!-- Buttons -->
                             @elseif($ele=='button')
                                 <div class="child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}">
                                     <div class="position-relative btn_Envoyer" style="width:max-content">
                                         <a class="btn btn_dark_  envoyer-button" style=""
                                            @if(isset($conditions[$order][$ele]->link)) href="{{$conditions[$order][$ele]->link}}" @endif
                                         >
                                             @if(isset($conditions[$order][$ele]->value)) {{$conditions[$order][$ele]->value}}  @else {{__('fields.'.$ele)}} @endif
                                         </a>
                                     </div>
                                 </div>

                            <!-- Captcha -->
                            @elseif($ele == 'message')
                                 <!-- Paragraph -->
                                      <?php $star = $f['obligatior']=='required'?"*":"" ?>

                                      <div class="form-group col-12 child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <textarea name="" id="" style="height:100px"
                                        placeholder="@if(isset($conditions[$order][$ele])){{$conditions[$order][$ele]->placeholder}}@else {{__('fields.'.$ele)}} @endif {{$star}}"
                                              cols="30" class=" w-100 form-control"
                                    ></textarea>
                                </div>


                            <!-- Captcha -->
                            @elseif($ele=="captcha")

                                <div class="form-group  col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <div class="captcha">
                                         <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger reload" id="reload">&#x21bb;</button>
                                    </div>
                                    <input type="text" {{$f['obligatior']}}  class="form-control col mt-2 mb-2">
                                </div>

                        <!-- Telephone -->
                            @elseif($ele=="telephone")
                                   <?php
                                    $star = $f['obligatior']=='required' ? " *" : "";
                                    $oblig = json_decode($f['conditions'])[0]->obligatoire[0]->placeholder??'0123456789'
                                    ?>

                                <div class="form-group  col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <input type="text" {{$f['obligatior']}}

                                    placeholder="{{$f['type_elements']=='national'? $oblig.$star : '+ '.$oblig.$star}}"
                                           class="form-control col mt-2 mb-2">
                                </div>

                        <!-- Privacy -->
                            @elseif($ele == "privacy")

                                <div  class="form-group col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <label >
                                         <div class="checkbox checkbox-outline checkbox-lg checkbox-success privacy_previews">
                                        <input type="checkbox" name="radios15"  />
                                        <span></span>
                                    &nbsp; &nbsp; <div class="text__1 ml-3">{!! $f['text'] !!}</div>
                                         </div>
                                    </label>
                                </div>

                        <!-- Date -->
                            @elseif($ele=="date")
                                      <?php $star = $f['obligatior']=='required'?"*":"" ?>

                                @if(isset($f['type_elements']))
                                       <div data-index="" class="p-2  col-12 date_zonn date_deroulante_Cl01 date_deroulante_zonne child_date"
                                            data-type="{{$f['date_type']}}"
                                            @if($f['type_elements'] == "date_deroulante") style="display: block" @else  style="display: none" @endif>
                                       </div>

                                            <div class="p-2  col-12  date_zonn champs_date_zonne child_date"
                                                 data-type="{{$f['date_type']}}"
                                              @if($f['type_elements'] == "champs_date") style="display: block" @else  style="display: none" @endif
                                            >

                                                 <input type="text" placeholder="{{date('d-m-Y')}} {{$star}} " class="form-control hasDatepicker">
                                            </div>

                                            <div class="p-2 date_zonn col-12 selection_date_zonne  child_date" id="date"
                                                 data-type="{{$f['date_type']}}"
                                                 @if($f['type_elements'] == "selection_date") style="display: block" @else  style="display: none" @endif
                                                 >

                                                 <div class="input-group date">
                                                      <input type="text" class="form-control hasDatepicker  @if(isset($ispreview)) wf_datePicker @endif"
                                                             readonly="" value="{{date('d-m-Y')}}" id="">
                                                      <div class="input-group-append">
                                                         <span class="input-group-text">
                                                          <i class="la la-calendar"></i>
                                                         </span>
                                                      </div>
                                                 </div>
                                            </div>
                                @endif

                        <!-- Hour -->
                            @elseif($ele == "heure")

                                {{--                                <div>--}}
                                <div class="form-group  col-12  child_{{$f[$ele]}} timepicker24 {{$f['type_elements']=="24h" ? "":"type_date_desactive"}} " id="{{$f[$ele]}}" data-index="0">
                                    <div class="input-group">
                                        <input class="form-control kt_timepicker @if(isset($ispreview))wf_timePicker @endif"  data-type="24" readonly placeholder="Sélectionnez l'heure" type="text"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group  col-12  child_{{$f[$ele]}} timepicker12 {{$f['type_elements']=="12h" ? "":"type_date_desactive"}} "  id="{{$f[$ele]}}" data-index="0" >
                                    <div class="input-group ">
                                        <input class="form-control kt_timepicker @if(isset($ispreview))wf_timePicker @endif" data-type="12"
                                               readonly placeholder="Sélectionnez l'heure" type="text"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-clock-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                                {{--                                </div>--}}

                        <!-- Multiple -->
                            @elseif($ele == "multiple" )

                                <div class="form-group mb-1 col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <div class="row">

                                        @foreach($f['eleme'] as $el)

                                            <label class="radio radio-outline radio-lg radio-success col-6 py-2">
                                                <input type="radio"  name="radios15_{{$el['elementmcd_id']}}" >
                                                <span></span>
                                                    &nbsp;
                                                @if($el['image'])
                                                      <img id="myImg" class="image img_privews_option" src="{{$el['image']}}"
                                                            style=" width: 100px; border-radius: .5rem;">
                                                @else
                                                    {{$el['title']}}
                                                @endif
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                        <!-- CheckBox -->
                            @elseif($ele == "caseacocher" )

                                <div class="form-group mb-1 col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <div class="row">
                                        @foreach($f['eleme'] as $el)
                                            <label class="checkbox checkbox-outline checkbox-lg checkbox-success  py-2 col-6">
                                                <input type="checkbox"  name="radios15_{{$el['elementmcd_id']}}" >
                                                <span></span>
                                                &nbsp;
                                                @if($el['image'])
                                                      <img id="myImg" class="image img_privews_option" src="{{$el['image']}}"
                                                           style=" width: 100px; border-radius: .5rem;">
                                                @else
                                                    {{$el['title']}}
                                                @endif
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                        <!-- ScrollingMenu -->
                            @elseif($ele == "menuderoulant" )

                                <div class="form-group mb-1 col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <select class="form-control " id="exampleSelect1">
                                        @foreach($f['eleme'] as $el)
                                            @if($el['image'])
                                                <option value="{{$el['value']}}" style="background:{{$el['image']}}">
                                                        {{--                                                                             --}}
                                                        {{--                                                                                        <div class="image-input image-input-outline ml-5" id="kt_image_1" style="overflow: hidden" title="0">--}}
                                                        {{--                                                                                                <div class="image-input-wrapper">--}}
                                                        {{--                                                                                                        <img id="myImg" class="image w-100" src="{{$el['image']}}">--}}
                                                        {{--                                                                                                </div>--}}
                                                        {{--                                                                                        </div>--}}

                                                </option>
                                            @else
                                                <option value="{{$el['value']}}">
                                                    {{$el['title']}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                        <!-- Satisfaction -->
                            @elseif($ele == "satisfaction" )

                                        @foreach($f['eleme'] as $key=> $el)
                                                @if($form['fields'][$order]['type_elements']=='star')
                                                     <label class="py-2 col d-flex align-items-center ">
                                                          <i class="fa fa-star fa-2X  cursor-pointer emojy-form emojy_form_star " data-order="{{$order}}" data-index="{{$k}}"></i>
                                                     </label>
                                                @elseif($form['fields'][$order]['type_elements']=='text')
                                                     <label class="outline  py-2 col-12">
                                                          <input type="radio" class="d-none" name="radios15_{{$el['elementmcd_id']}}" >
                                                          {{$el['title']}}
                                                     </label>
                                                @else
                                                     <label class="radio radio-outline radio-lg radio-success col py-2">
                                                          <input type="radio" checked="checked" name="radios15_{{$el['elementmcd_id']}}" >
                                                          <span></span>
                                                     </label>
                                                @endif
                                        @endforeach


                        <!-- ImportFile -->

                                 @elseif($ele == "importfichier" )

                                <div class="form-group mb-1 col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <div class="dropzone " style="padding: 0px 20px !important;" id="kt_dropzonejs_example_1">
                                        <!--begin::Message-->
                                        <div class="dz-message needsclick">
                                            <!--begin::Icon-->
                                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                            <!--end::Icon-->

                                            <!--begin::Info-->
                                            <div class="ms-4">
                                                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Déposez les fichiers ici ou cliquez pour télécharger.</h3>
                                                <span class="fs-7 fw-bold text-gray-400">Téléchargez jusqu'à 10 fichiers</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                    </div>
                                </div>

                        <!-- Separator -->
                            @elseif($ele == 'separateur')

                                <div class="form-group mb-1 col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    <div class="col-12 separator separator-solid mt-8 mb-5"></div>
                                </div>
                        <!-- Title -->
                             @elseif($ele == 'title')


                        <!-- Media -->
                            @elseif($ele == 'media')
                                 <div class="wrap-symbol-media @if(isset($f['attributes'])){{json_decode($f['attributes'])->float??''}} @endif">
                                      <div class="symbol-list d-flex flex-wrap">
                                           @foreach($f['eleme'] as $key=> $el)
                                                <div class="symbol @if(isset($f['attributes'])){{json_decode($f['attributes'])->size ??'symbol-30'}} @endif my-2 mr-5">
                                                     <a href="{{$el['value']}}" title="{{$el['title']}}" >
                                                          <div class="symbol-label" style="background-image: url('/media/svg/social-icons/{{$el['title']}}.svg')"></div>
                                                     </a >
                                                </div>
                                           @endforeach
                                      </div>
                                 </div>



                        <!-- Section -->
                            @elseif($ele == 'section')

                                <div class="form-group mb-1 col-12  child_{{$f[$ele]}}" id="{{$f[$ele]}}">
                                    database field_preview
                                </div>
                        <!-- Identities -->
                            @elseif($f['typeChamp']=='identities')

                                      <div class="form-group col-lg-6 col-12 @if($f[$ele] =="0") hiddenElement @else showElement @endif   child_{{$ele}}" id="{{$f[$ele]}}_{{$k}}">
                                           <input type="text" placeholder="@if(isset($conditions[$order][$ele]->placeholder)) {{$conditions[$order][$ele]->placeholder}}  @else {{__('fields.'.$ele)}} @endif @if(isset($conditions[$order][$ele]) && $conditions[$order][$ele]->required) * @endif"
                                                  @if(isset($conditions[$order][$ele])&& $conditions[$order][$ele]->required) required @endif
                                                  class="form-control">
                                      </div>

                        <!-- Address -->
                            @elseif($f['typeChamp']=='address')

                                      <div class="form-group col-lg-6 col-12 @if($f[$ele] =="0") hiddenElement @else showElement @endif   child_{{$ele}}" id="{{$f[$ele]}}_{{$k}}">
                                           <input type="text" placeholder="@if(isset($conditions[$order][$ele]->placeholder)){{$conditions[$order][$ele]->placeholder}} @else {{__('fields.'.$ele)}} @endif @if(isset($conditions[$order][$ele]) && $conditions[$order][$ele]->required) * @endif"
                                                  @if(isset($conditions[$order][$ele]) && $conditions[$order][$ele]->required) required @endif
                                                  class="form-control">
                                      </div>

                        <!-- Email -->
                            @elseif($f['typeChamp']=='email')
                                      <div class="form-group col-lg-12 col-12 @if($f[$ele] =="0") hiddenElement @else showElement @endif   child_{{$ele}}" id="{{$f[$ele]}}_{{$k}}">
                                           <input type="text" placeholder="@if(isset($conditions[$order][$ele]->placeholder)) {{$conditions[$order][$ele]->placeholder}}  @else {{__('fields.'.$ele)}}  @endif {{$f['obligatior']=='required'?"*":""}}"

                                                  class="form-control">
                                      </div>

                        <!-- reponsecourte -->
                            @elseif($f['typeChamp']=='reponsecourte')

                                      <div class="form-group col-lg-12 col-12 @if($f[$ele] =="0") hiddenElement @else showElement @endif   child_{{$ele}}" id="{{$f[$ele]}}_{{$k}}">
                                           <input type="text" placeholder="@if(isset($conditions[$order][$ele]->placeholder)){{$conditions[$order][$ele]->placeholder}} @else {{__('fields.'.$ele)}}  @endif {{$f['obligatior']=='required'?"*":""}}" class="form-control">
                                      </div>

                        <!-- Email -->
                            @elseif($f['typeChamp']=='siteweb')

                                      <div class="form-group col-lg-12 col-12 @if($f[$ele] =="0") hiddenElement @else showElement @endif   child_{{$ele}}" id="{{$f[$ele]}}_{{$k}}">
                                           <input type="text" placeholder="@if(isset($conditions[$order][$ele]->placeholder)){{$conditions[$order][$ele]->placeholder}} @else {{__('fields.'.$ele)}}  @endif {{$f['obligatior']=='required'?"*":""}}"

                                                  class="form-control">
                                      </div>
                        <!-- societe -->
                            @elseif($f['typeChamp']=='societe')

                                      <div class="form-group col-lg-12 col-12 @if($f[$ele] =="0") hiddenElement @else showElement @endif   child_{{$ele}}" id="{{$f[$ele]}}_{{$k}}">
                                           <input type="text" placeholder="@if(isset($conditions[$order][$ele]->placeholder)){{$conditions[$order][$ele]->placeholder}} @else {{__('fields.'.$ele)}}  @endif {{$f['obligatior']=='required'?"*":""}}"

                                                  class="form-control">
                                      </div>



                        <!-- Signature -->
                            @elseif($f['typeChamp']=='signature')

                                      <div class="form-group col-12 @if($f[$ele] =="0") hiddenElement @else showElement @endif
                                           child_{{$ele}}" id="{{$f[$ele]}}_{{$k}}">
                                           <div class="row w-100">
                                                <div class="form-group  mb-1 col-12  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
                                                     <div id="sig" style="    width: 100% !important;
                                                                               height: 123px !important;
                                                                               border: 1px solid;"></div>
                                                     <textarea id="signatureArea" name="signed"  style="display: none"></textarea>
                                                </div>
                                                <div id="clear" class="ml-4  ">claire</div>
                                           </div>
                                      </div>


                            @else
                                <div class="form-group col-12 @if($f[$ele] =="0") hiddenElement @else showElement @endif   child_{{$ele}}" id="{{$f[$ele]}}_{{$k}}">
                                    <input type="text" placeholder="{{__('fields.'.$f[$ele]) }} {{$f['obligatior']=='required'?"*":""}}"  class="form-control">
                                </div>
                            @endif

                        @endif
                    @endforeach

                        </div>
                </div>

        @endforeach
@endif

