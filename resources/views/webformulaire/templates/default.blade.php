@if($form['fields'])
{{--    {{dd($form['stylesCss']['formStyle'])}}--}}
	<div id="templates_v" class="general-form templates_{{explode('/',$form['template']??'/default')[1]}} form_{{explode('/',$form['template']??'default/')[0]}}
	@if(isset($isIfram))
		templateIfram
	@endif "

	     style="{{$form['stylesCss']['formStyle']??'padding:15px;background:transparent'}}"
	>



                <div class="form w-100 innerFormSaveData" >

                    <div class="cardheadersdfsdf position-relative">



                        <div class="fade alert alert-custom "  id="notificationSide" role="alert" style="
                                position: absolute;
                                top: 0px;
                                left: 50%;
                                height: max-content;
                                transform: translateX(-50%);
                                transform-origin: center;
                            ">
                            <div class="alert-text "> alerte !</div>
                        </div>

                        <div class="">
                            <h3 class="col-12 carsdfle title-form p-0" id="title-{{$id}}"
                                style="{{$form['stylesCss']['title']??''}}" >
                                 {{$form['title']}}
                            </h3>


                            <span class="col-12 ">
                                    <div class="alert-text description-form  mx-3"
                                         id="description-{{$id}}"
                                         style="{{$form['stylesCss']['description']??''}}" >
                                        {{$form['detail']}}
                                    </div>
                              </span>
                        </div>


                        <div class="MyProgress">
                            <div class="step_etaps progress">
                                <span class="progress_bar"></span>
                            </div>
                        </div>

                        <div class="MyProgres_namestap">
                            <ul>

                                @if(count($steppers)!=0)
                                    @foreach($steppers as $k=>$step)

                                        @if(!isset(json_decode($form['fields'][$k]['conditions'])[0]->titleVisible) || json_decode(   $form['fields'][$k]['conditions'])[0]->titleVisible == true)
                                        <li>{{$step['name']}}</li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                    </div>

                    <div class="cardsdfbody">

                            @if(count($steppers)!=0 && $form['template']=='Template_Step')

                                @foreach($steppers as $k=>$step)

                                    <div class="fieldsForm formgroup col-12" >
                                        @foreach(json_decode($step["fields"]) as $k=>$steps)

                                            @if(isset($formById[$steps]['typeChamp']))
                                                @php
                                                    $req= "";
                                                    if($formById[$steps]['typeChamp'] == "signature"){
                                                         if($formById[$steps]['obligatior']) {$req = '*';}
                                                    }
                                                @endphp

                                                <div class="fieldsForm_child fieldsForm_{{$formById[$steps]['typeChamp']}}">
                                                    @if(!isset(json_decode($f['conditions'])[0]->titleVisible) || json_decode($f['conditions'])[0]->titleVisible == true)
                                                        @if($formById[$steps]['typeChamp']!="separateur" && $formById[$steps]['typeChamp']!="paragraphe" )
                                                            <h4 class="head-group">
                                                                <span id="name_group" class="name_group" style="{{$form['stylesCss']['titleChamp']}}">
                                                                   {{$formById[$steps]['name_group']}} {{$req}}
                                                                </span>
                                                            </h4>
                                                        @endif
                                                    @endif
                                                    <div class="row Element_{{$formById[$steps]['typeChamp']}}" id="Elementmcd">

                                                        @include('webformulaire.templates.champs.'.$formById[$steps]['typeChamp'])

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            @else

        <!--					   --><?php
                            $data_child__ = [];
                            $data_option__ = [];
                            $data_child_equals = [];
                            $data_child= [];

                                if(json_decode($form['conditions'])!=null){

                                    foreach (json_decode($form['conditions']) as $condi){
                                        $data_child__[json_decode($condi)->data_conditional->if_fields] = json_decode($condi)->data_conditional->field_condition;
                                        $data_option__[json_decode($condi)->data_conditional->field_condition] = json_decode($condi)->data_conditional->equals;
                                    }

                                }

        //					   ?>

                                @if(isset($form['fields']))
                                    <div class="row">

                                        @foreach ($form['fields'] as $k=>$f)
                                            @php
                                                $req= "";
                                                if($f['typeChamp'] == "signature"){
                                                     if($f['obligatior']) {$req = '*';}
                                                }
                                            @endphp


                                            <div class="fieldsForm cl_{{$f['fieldId']}} formgroup my-2 @if(isset($attributes[$k]['grid']))  col-{{$attributes[$k]['grid']}} @else col-12 @endif   fieldsForm_{{$f['typeChamp']}} {{ $card = ($f['typeChamp'] != 'section') ? 'card-field'  : '' }}"
                                                 data-id="{{$f['fieldId']}}"
                                                 data-option="@isset($data_option__[$f['fieldId']]){{json_encode($data_option__[$f['fieldId']])}}@endisset"
                                                 data-child="@isset($data_child__[$f['fieldId']]){{$data_child__[$f['fieldId']]}}@endisset"
                                                 dragable="{{ $draggable = ($f['typeChamp'] != 'section') ? 'true'  : 'false' }}" >

                                                @if(!isset(json_decode($f['conditions'])[0]->titleVisible) || json_decode($f['conditions'])[0]->titleVisible == true)
                                                    @if($f['typeChamp']!="separateur" && $f['typeChamp']!=="paragraphe")
                                                        <h4 class="head-group">
                                                             <span id="name_group" class="name_group" style="{{$form['stylesCss']['titleChamp']??''}}"> {{$f['name_group']}} {{$req}} </span>
                                                        </h4>
                                                    @endif
                                                @endif


                                                <div class="row  Element_{{$f['typeChamp']}}" id="Elementmcd"
                                                    @if($f['typeChamp'] == "address" || $f['typeChamp'] == "identities") style="margin-left: auto;" @endif
                                                >
                                                    @include('webformulaire.templates.champs.'.$f['typeChamp'])
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                @endif
                            @endif

        {{--				</div>--}}
                    </div>

                    <div class="casdfoter position-relative w-100 ">
                        <div class="btns_Step position-relative">
                            <a class="btn  btn-primary btns_Step_child prev_etap" onclick="nextPrev(-1)" id="prevBtn">
                                <span class="svg-icon  svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
                                        </g>
                                    </svg>
                                </span>
                            </a>

                            <a class="btn  btn-primary  btns_Step_child next_etap" onclick="nextPrev(1)" id="nextBtn">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
                                        </g>
                                    </svg>
                                </span>
                            </a>

                           @if($form['hasButton'] == false)

                                <div class="position-relative btn_Envoyer" style="{{$form['stylesCss']['parentBtn']??''}}">
                                    <a  class="btn btn_dark_  envoyer-button" style="{{$form['stylesCss']['btn_Envoyer']??''}}">
                                        Envoyer
                                    </a >
                                </div>

                           @endif

                        </div>

                    </div>

                </div>

        @endif

{{--		@include('globals.alerts.alert')--}}
	</div>


@section('styles')
    <style>

        .btn_dark_ {
            background: #ccc ;
            color: #000 ;
        }
        .btn_dark_:hover {
            background: #000;
            color: #fff ;
        }
    </style>

@endsection

@if(isset($isIfram))

	@section('scripts')

		<script src="{{asset('/js/plugins/jquery-ui.js')}}"></script>
		<script src="{{asset('/js/plugins/dropzone-min.js')}}"></script>
		<script src="{{asset('/js/plugins/less.min.js')}}"></script>
		<script src="{{asset('js/pages/forms/timePicker.js')}}"></script>
		<script src="{{asset('js/pages/forms/datePiker.js')}}"></script>
		<script src="{{asset('js/pages/crud/file-upload/dropzonejs.js')}}"></script>
		<script src="{{asset('js/pages/forms/jquery.MultiFile.min.js')}}" ></script>
		<script src="{{asset('js/pages/forms/webform/send-data-form.js')}}" ></script>

		<script>
            resizeChamp([
                'address',
                'identities',
            ]);


		     let value_form_="";

		     // for Switch between Date
		     $.getJSON('{{asset('/js/pages/forms/buildform/forms_webform_.json')}}',
			     function (data) {
				     // let value_form_

				     $.each(data, function (key, value) {
					     let datatyp = $('.date_deroulante_Cl01').attr('data-type');
					     if(value.title ==datatyp )
				               value_form_ += value.forms
					     setTimeout(()=>{ $('.type_date_01').removeClass('type_date_desactive')
					     },100)
				     });

				     $('.date_deroulante_Cl01').append(value_form_);
				     DisplayDate()
			     })
		</script>

		<script >

		     var numberStep = $('#templates_v').find('.fieldsForm').length
		     var casec = "";
		     var filesTOUpload = [];


	          collectFilesAndNameIt();

             if ($('.btn_Envoyer').attr('listener') !== 'yes') {
                 $('.btn_Envoyer').attr('listener', 'yes');
                 var submitting = false;

                 $('.btn_Envoyer').click(function (event) {

                     if (!validateForm(submitting)) return false;

                     if (submitting) {
                         event.preventDefault();
                         return;
                     }
                     submitting = true;


                     var list = [];




                     var d = $('.FormSaveData').serializeArray();

                     $.each(d, function (i, field) {
                         if (field.name.match('caseacocher') != null && field.value != null) {
                             list[i] = field.value
                             casec = field.name
                         }
                         dataForm[field.name] = field.value
                     });

                     if (casec.match('caseacocher') != null) {
                         dataForm[casec] = (list)
                     }

                     if ($('.joined').length != 0) {
                         chosseTypeDisplayDateSelect();
                     }


                     function resetData() {
                         $('input[type="radio"]').prop('checked', false);
                         sessionStorage.removeItem('satisfaction')
                     }
                     resetData()

                     $.ajax({
                         url: $(".FormSaveData").attr('action'),
                         method: 'POST',
                         // data: formData,
                         data: {'data': Object.entries(dataForm)},
                         headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

                         success: function (data) {
                             submitting = false;

                             if (data['status'] == '200') {

                                 $('.form_stepper').find('.progress_bar').css('width', '100%')
                                 $('.NumberStep2').text(numberStep + "/" + numberStep)

                                 if (data['type_notifiy'] == 'Text') {

                                     $('.FormSaveData')[0].reset();
                                     notificationSide('alert-light-success active show', data['message'], 3000)

                                 } else {
                                     location.href = "/confirmation/" + data['id'];
                                 }

                             } else {
                                 notificationSide('alert-light-danger active show', 'Merci pour voutre contacte', 3000)
                             }
                         },
                         error: function (error) {
                             submitting = false;
                             // rest of your error code here
                         }
                     })

                 })
             }

		</script >
	@endsection

@endif


@section('beforescript')
	<script >

	     var step = 0;
	     var widthProg = 0

	     var dataForm = [];
	     var dataFormulaire = [];
	     var dataFormulaire_ = [];
	     var hasError = 0;
	     var dataImag = "";
	     var currentTab = 0; // Current tab is set to be the first tab (0)
	     showTab(currentTab); // Display the current tab

	     function errorDisplay(_messag,_this){
		     _this.parents('.form-group').find('.error_Form').remove();
		     _this.parents('.form-group').append(`<span class="text-danger error_Form">${_messag}</span>`);
		     return hasError ++;
	     }

	     function errorDisplayWithClass(_messag,_class){
		     $('.'+_class).find('.error_Form').remove();
		     $('.'+_class).append(`<span class="text-danger error_Form">${_messag}</span>`);
		     return hasError ++;
	     }

	     function showTab(n) {
		     // This function will display the specified tab of the form...
		     var x = document.getElementsByClassName("fieldsForm");
		     $('.NumberStep2').text((currentTab)+"/"+x.length)

		     x[n].style.display = "block";

		     if (n == 0) {
			     document.getElementById("prevBtn").style = "pointer-events: none";
		     } else {
			     document.getElementById("prevBtn").style = "pointer-events: all";
		     }

		     if (n == (x.length - 1)) {
			     document.querySelector(".prev_etap").style.display = "none";
			     document.querySelector(".next_etap").style.display = "none";
			     document.querySelector(".btns_Step").classList.add("positionEnd");
			     document.querySelector(".btn_Envoyer").classList.add("btn_Envoyer__WJ");
			     document.querySelector(".btn_Envoyer").classList.add("btn_Envoyer_Etp");
		     }
	     }

	     function nextPrev(n) {


		     // This function will figure out which tab to display
		     var x = document.getElementsByClassName("fieldsForm");

		     if (n == 1 && !validateForm()) return false;

		     if (n == 1){
			     widthProg += 100/(x.length);

		     }else{
			     widthProg -= 100/(x.length);
		     }


		     $('.form_stepper').find('.progress_bar').css('width',(widthProg)+'%' )
		     x[currentTab].style.display = "none";
		     // Increase or decrease the current tab by 1:
		     currentTab = currentTab + n;

		     $('.NumberStep2').text((currentTab)+"/"+x.length)
		     // if you have reached the end of the form...
		     if (currentTab >= x.length) {
			     sendAjaxData()
			     return false;
		     }
		     // Otherwise, display the correct tab:
		     showTab(currentTab);

	     }

	     function validateForm(submitting) {
		     // This function deals with validation of the form fields
		     var x, y, i, valid = true;

	          if($('.form_stepper').length==0){
	               x = $(".fieldsForm");
	               y = $(x).find('.myInputs');
	          }else{
	               x = $(".fieldsForm");
	               y = $(x[currentTab]).find('.myInputs');
	          }

		     for (i = 0; i < y.length; i++) {
			     // If a field is empty...

			     $(y).eq(i).parents('.form-group').find('.error_Form').remove();
			     var phoneInternational = new RegExp('^[+]([0-9]{2}[\\ ]?){4,}[0-9]{1,2}$');
			     var phoneNational = new RegExp('^([0-9]{2}[\\ ]?){4,}[0-9]{1,2}$');



			     function regexTele(){

				     if($(y).eq(i).attr('data-condition')=='international' && phoneInternational.test($(y).eq(i).val())==false){
					     errorDisplay('Le format correcte est (+0011223344556)',$( y[i] ))
					     valid = false;
				     }

				     if(y[i].getAttribute('data-condition')=='national' && phoneNational.test($(y).eq(i).val())==false){
					     y[i].className += " invalid";
					     errorDisplay('Le format correcte est (112233445566)',$( y[i] ))
					     valid = false;
				     }

			     }

			     if($(y).eq(i).attr('required'))
			     {
				     regexTele()

			     }else{
			     	if($(y).eq(i).val()!==''){
					     regexTele()
				     }
			     }



			     if(y[i].getAttribute('data-name')=='reponsecourte' && $(y[i]).val().length > y[i].getAttribute('data-condition') ){
				     y[i].className += " invalid";
				     errorDisplay('les données de format sont incorrectes '+$(y[i]).attr('data-condition')+')',$( y[i] ))

				     valid = false;
			     }


			     if(y[i].getAttribute('data-name')=='paragraphe'  && $(y[i]).val().length > y[i].getAttribute('data-condition')){
				     y[i].className += " invalid";
				     errorDisplay('les données de format sont incorrectes (max : '+y[i].getAttribute('data-condition')+')',$( y[i] ))
				     valid = false;
			     }

			     if ($(y[i]).attr('type')=="checkbox" && $(y[i]).is(':checked')==false && y[i].getAttribute('required')!=null) {

				     y[i].className += " invalid";

				     errorDisplay('Vous devez accepter les conditions.',$('input[type="checkbox"]') );
				     $(y).eq(i).parents('.form-group').append(`<!--<span class="text-danger error_Form">Attention, ce champ est requis.</span>-->`);
				     valid = false;
			     }
			     //
			     // if ($('.signatureArea').val() == "" && y[i].getAttribute('required')!=null) {
				//      y[i].className += " invalid";
				//      errorDisplay('Vous devez accepter les conditions.',$('input[type="checkbox"]') );
				//      $(y).eq(i).parents('.form-group').append(`<!--<span class="text-danger error_Form">Attention, ce champ est requis.</span>-->`);
				//      valid = false;
			     // }

			     if ($(y[i]).val() == "" && y[i].getAttribute('required')!=null) {
				     y[i].className += " invalid";
				     errorDisplay('Attention, ce champ est requis.',$( y[i]) );
				     $(y).eq(i).parents('.form-group').append(`<!--<span class="text-danger error_Form">Attention, ce champ est requis.</span>-->`);
				     valid = false;
			     }

		     }
             submitting = false;
		     return valid; // return the valid status
	     }

	     setTimeout(() => {
		     if($('.joined').attr('required')){
			     $('.date_deroulante_Cl01').find('.form-control').attr("required", "true")
			     $('.date_deroulante_Cl01').find('.form-control').addClass('myInputs')
		     }
	     },200)





	</script >

	<script src="{{asset('js/pages/forms/flashcanvas.js')}}" ></script>
	<script src="{{asset('js/pages/forms/jSignature.min.js')}}" ></script>


	<script>
		$(document).ready(function() {

			if($('.general-form').find(".sig").length > 0){
				$sigdiv = $(".sig").jSignature({ lineWidth: 2, showLine: true , width: '100%',
					height: 250 })


				var datapair = $sigdiv.jSignature("getData", "svgbase64")

				var i = new Image()
				i.src = "data:" + datapair[0] + "," + datapair[1]
				$sigdiv.bind('change', function(e){
					var dataToBeSaved =  $sigdiv.jSignature("getData","image");
					$(this).parent().find('.signatureArea').val("data:" + dataToBeSaved[0] + "," + dataToBeSaved[1])
				})

				$('#clear').click(function(){
					$sigdiv.jSignature("reset") // clears the canvas and rerenders the decor on it.
				})
			}

		})

	</script>

	<script src="{{asset('js/pages/forms/webform/jquery.picky.js')}}" ></script>
	<script>
		$(document).ready(function () {
			$(".date").picky();
            fnResize()
            if(removeLastWord(window.location.pathname) == "/form"){

                $( ".innerFormSaveData" ).wrap( `<form class="form w-100 FormSaveData" enctype="multipart/form-data"  action="{{route('formulaires.data.store',$id)}}" method="POST" >
` );
            }
		});

        function removeLastWord(str) {
            const lastIndexOfSpace = str.lastIndexOf('/');

            if (lastIndexOfSpace === -1) {
                return str;
            }

            return str.substring(0, lastIndexOfSpace);
        }


		function fnResize(){

            if ($('.innerFormSaveData').width() > 425) {
                $('.innerFormSaveData').removeClass('responsive-form')
            } else {
                $('.innerFormSaveData').addClass('responsive-form')
            }
        }


        $(window).resize(function() {
            fnResize()
        })

	</script>
@endsection
