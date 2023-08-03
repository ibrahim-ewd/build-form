@extends('../welcome')
@section('title', env('APP_NAME').' - Forms')

@section('breadcrumbs')
	{{ Breadcrumbs::render('webformulaire_logique_conditionnelle',[$form,Cookie::get('side')]) }}
@endsection


@section('active_Fo','active')


@section('styles')

	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style>
		.type_date_desactive{
			display:none;
		}

		.hiddenElement{
			display:none;
		}

		.order_field{
			background: transparent !important;
			border: 0px;
			padding: 0 6px;
		}
		.fieldsForm{
			padding: 20px;
			border: 1px dotted rgba(42, 42, 42, 0.25);
			transition: 0.1s linear;
		}
		.fieldsForm:hover{
			border: 1px dotted rgba(42, 42, 42, 0.79);
			cursor: move;
		}
		.image-input .image-input-wrapper {
			width: 174px !important;
			height: 130px !important;
			border-radius: .5rem !important;
		}

		.btnsTodoList {
			display:flex;
			flex-direction: row;
			position: absolute;
			right: 30px;
		}
		div#Chump_radios {
			position: relative;
		}
	</style>

@endsection

@section('page',"Webformulaires")

@section('content')

	{{--    todo ask me --}}
	@include('globals.tabs_elementsform')


	<!-- Alert  -->
	@include('globals.alerts.success')
	@include('globals.alerts.danger-valid')

	<div class="card card-custom mt-10">

		<div class="card-body row">
			{{--  col-4  --}}
			<div class="col-sm-4 px-5">
				<div class="tab-content" id="myTabContent">

					<div class="tab-pane fade @if($current_rout=="webformulaire.rules")  show active @endif " id="tb_rules" role="tabpanel">
						@include('webformulaire.building.includes.field_rules')
					</div>
				</div>
			</div>

			{{--  col-8  --}}
			<div class="dropzone col-sm-8" ondrop="drop(event)" ondragover="allowDrop(event)" >
				<input type="hidden" id="csrftoken_" name="_token" value="{{ csrf_token() }}" >
				<div id="dflg" class="row container
                    @if($current_rout=="webformulaire.rules") just-read @endif" >
					@include('webformulaire.building.includes.field_preview')
				</div>
			</div>
		</div>
	</div>
@endsection





@section('scripts')

	<script src="{{asset('js/pages/forms/card_tools.js')}}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
	<script src="{{asset('/js/pages/crud/forms/widgets/bootstrap-timepicker.js')}}"></script>
	<script src="{{asset('/js/pages/crud/forms/widgets/bootstrap-datepicker.fr.js')}}"></script>
	<script src="{{asset('js/pages/forms/timePicker.js')}}"></script>
	<script src="{{asset('js/pages/forms/datePiker.js')}}"></script>
	<script src="{{asset('js/pages/crud/file-upload/dropzonejs.js')}}"></script>


	{{-- for build form    --}}

	<script src="{{asset('/js/pages/forms/buildform/globale_Function.js')}}"></script>

	<script src="{{asset('/js/pages/forms/buildform/displayContentField.js')}}"></script>
	<script src="{{asset('/js/pages/forms/buildform/history.js')}}"></script>
	<script src="{{asset('/js/pages/forms/buildform/listenerUpdate_CS.js')}}"></script>
	<script src="{{asset('/js/pages/forms/buildform/houre_function.js')}}"></script>
	<script src="{{asset('/js/pages/forms/buildform/date_function.js')}}"></script>
	<script src="{{asset('/js/pages/forms/buildform/mcd_functions.js')}}"></script>
	<script src="{{asset('/js/pages/forms/buildform/conditions-logic.js')}}"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


	<script>

		let index__ = 0;            //!  length for each section
		let namechamp ="";          //! Name the champ selected
		let pos = '';               //! position field in parent div   = length childes in parent
		let sep = '';               //! sub edit Position
		let preconfigured0 = [];   //! a list of all the buttons who's we dropping it
		let preconfigured1 = [];   //! a list of all the buttons who's we dropping it
		let preconfigured2 = [];   //! a list of all the buttons who's we dropping it
		let data_fch = [];
		const arr = [];
		let _forms = '';
		let i ='';


		const checkes =[];  //! checks box for each Fields edit
		const position =[]; //! position for each group form element
		const edit_btn =[]; //! the btns for edits
		let btn_Elements=[]


		let btn_Elements_arr = [] ;
		let groupsform = {!!  json_encode(config('webform.groupsform'),true)  !!} ;

		let imageCap =`{!! captcha_img() !!}`;
		let fields_Data ={!! json_encode($form['fields']) !!};

			{{--        let conditions_Data ={!!json_encode( $conditions )!!};--}}


		let groupsform_arr =[];
		let type_elements_arr =[];
		let type_champ_arr =[];
		let groupsform_Attrbut =[]; // return attribute for the elements
		let aa = [];
		let bb = [];
		let cc = [];

		var divSub ="";
		let dataform = ""

		var data_delete = [];

		const check_obli = $('.check_obli');

		//Order All Elements Edit in parent Element
		let id_chump = document.getElementById('id_chump');

		//Order All Elements in parent Element
		const valc = document.querySelectorAll('.order_field');

		const name_group = document.getElementById('name_group');

		const name_group_edit = document.querySelector('.name_group_edit');

		const typeDatederoulante = document.getElementById('typeDatederoulante');
		const typeDatederoulante_select = document.getElementById('typeDatederoulante_select');

		const check_date = document.querySelectorAll('.check_date');
		const check_hours = document.querySelectorAll('.check_heure');
		const child_date = document.querySelector('.child_date');



		/* Multiple */
		const Multiple_Chump_radios = document.getElementById('Chump_radios');

		const multiple_btn_addChumpRadio = document.getElementById('btn_addChumpRadio');
		const multiple_title_chump = document.getElementById('title_chump')
		const multiple_image_chump = document.getElementById('image_chump')
		const multiple_value_chump = document.getElementById('value_chump')



		const multiple_title_MCD = document.getElementById('title_MCD')
		const multiple_image_MCD = document.getElementById('image_MCD')
		const multiple_value_MCD = document.getElementById('value_MCD')



		let field_todolist = "";
		let indx_todolist = 0;

		let Data_TodoListArr = []
		let posTot  = "";

		let arr_each_el = [];

		var posind = 0
		var namegroup  = ""

		for([key_,ele_] of Object.entries(groupsform)){

			btn_Elements_arr.push("field_"+key_);
			groupsform_arr.push(ele_['elements'])
			type_elements_arr.push(ele_['type_elements'])
			type_champ_arr.push(ele_['type_champ'])
			groupsform_Attrbut.push(ele_['attribute'])

			switch(ele_['type']){

				case "Champ_preconfigures":
					aa.push(key_)
					break;
				case 'Champs_Standards':
					bb.push(key_)
					break;

				case 'Mise_forme':
					cc.push(key_)
					break;
				default:
			}
		}
		let groups_form = [];
		groups_form.push(aa);
		groups_form.push(bb);
		groups_form.push(cc);




		// change name the group form
		name_group.addEventListener('change',(e)=> {
			e.preventDefault();
			document.querySelectorAll('.name_group').forEach((ele,i)=>{
				if(i == id_chump.value ) {
				    console.log(ele)
					ele.innerHTML = name_group.value
					data_fch[id_chump.value]['cols'][`name_group`] = name_group.value;
				}
			})
		})


		groups_form.forEach((ele_)=>{

			ele_.forEach((ele)=>{
				btn_Elements.push(ele) // return all the champs elements  in the config nome,prenom...
				checkes[ele] = document.querySelectorAll('.check_'+ele);  // return All the check box in settings
				position[ele] = document.getElementById('position_'+[ele]); // return position for all the chump
			})
		})


		function ButtonsForDraging(){


			/*
			* Function for build Buttons Default
			* */


			const ids = ["elements","elements_champStandar","Mise_forme"]

			groups_form[0].forEach((ele,ke)=>{

				preconfigured0.push(`<button class="form-control col-11 m-2"   name="field_${ele}" data-name="${ele}" draggable="true" ondragstart="drag(event)">  ${ groupsform[ele]['name_champ']} </button>`);
			})
			groups_form[1].forEach((ele,ke)=>{
				preconfigured1.push(`<button class="form-control col-11 m-2"   name="field_${ele}" data-name="${ele}"  draggable="true" ondragstart="drag(event)">  ${ groupsform[ele]['name_champ']}</button>`);
			})

			groups_form[2].forEach((ele,ke)=>{
				preconfigured2.push(`<button class="form-control col-11 m-2"   name="field_${ele}"  data-name="${ele}" draggable="true" ondragstart="drag(event)"> ${ groupsform[ele]['name_champ']} </button>`);
			})


			$("#"+ids[0]).append(preconfigured0);
			$("#"+ids[1]).append(preconfigured1);
			$("#"+ids[2]).append(preconfigured2);

		}


		$(document).ready(function () {

			Route_to_Editting({{$id}})
			index_origin()
			RestoreDataChump()
			ButtonsForDraging()


			// get date deroulante
			$.getJSON('{{asset('js/pages/forms/buildform/forms_webform_.json')}}',
				function (data) {
					$.each(data, function (key, value) {
						dataform += value.forms
					});
				})
		}); //End ready





		/*value_form
		*  function parent for build form
		* */
		var eleme__ = {};


		function buildform(ev, pos){

			divSub = "";
			namechamp = ev.dataTransfer.getData("text");


			for (const ele of btn_Elements_arr) {


				let key = btn_Elements_arr.indexOf(ele);
				let div__ = "";

				if(namechamp == ele){

					const type = ele.split("_");

					// KTBootstrapDAtepicker_();
					// KTBootstrapTimepicker_();

					groupsform_arr[key].forEach((inp,k)=>{
						PrintFields(inp,key,type_champ_arr[key],type_elements_arr[key],imageCap,type)
						// PrintFields(inp,key,type_champ_arr[key],type_elements_arr[key],imageCap,type)
					})

					div__ = `<div class="fieldsForm col-12" >
                                ${BtnEdite(type)}
                                    <div class="row Element_${type[1]}" id="Elementmcd">
                                    ${divSub}
                                </div>
                             </div>`;



					data_fch.push({"table":namechamp,
						"cols": {
							"forms_id": {{$id}},
							"order": pos,
							'Data_duplicate':posind,
							'name_group':namegroup,
							'obligatior':0,
							'fieldId': Date.now()
						},
						"elements":[{"title":"option 1","value":"option 1","image":"",'order':0}],
					})

					$('#dflg').append(div__);
				}
			}
		}


		function drop(ev) {

			namechamp = ev.dataTransfer.getData("text")
			pos = $('#dflg').children().length + 1

			buildform(ev, pos)
			index_origin()

			// modalMedia();
			document.querySelector('.feilds_formsEdit').style.display = 'block';
			document.querySelector('.field_message_error').classList.add('d-none');
			document.querySelector('.field_message_error').classList.remove('d-flex');
			Route_to_Editting()
			btnsheurs()
		}


		function padTo2Digits(num) {
			return num.toString().padStart(2, '0');
		}

		function formatDate(date) {
			return [
				padTo2Digits(date.getDate()),
				padTo2Digits(date.getMonth() + 1),
				date.getFullYear(),
			].join('-');
		}

		var langChamp = {

			'civilite'            :'Civilité',
			'prenom'             : 'Prénom',
			'nom'                : 'Nom',
			'rue_one'            : 'Rue ',
			'rue_two'            : 'Rue 2',
			'code_Postal'        : 'Code postal',
			'ville'              : 'Ville',
			'region'             : 'Région',
			'pays'               : 'Pays',
			'telephone'             :'Téléphone',
			'telephoneN*'             :'0123456789 *',
			'telephoneI*'             :'+0123456789 *',
			'email'                : 'Email',
			'site_web'           : 'Site web',
			'societe'           : 'Société',
			'commentaire'       : 'Commentaires',
			'signature'       : 'Signature',
			'paragraphe'       : 'Paragraphe',
			'title'       :'Titre',
			'message'       :'Message',
			'privacy'       :'Message',
			'reponsecourte'       :'Text',
			'date'       :  formatDate(new Date()) ,
			'heure'       :  "Sélectionner l'heure" ,
		}




		function PrintFields(inp,key,typchmp,elems,imageCap,type){


			switch(type[1]) {
				case "date":
					divSub += `<div data-index='' class="p-2  col-12 date_zonn  date_deroulante_zonne child_${inp}" style="display: none" >`;
					divSub += dataform ;
					divSub += `</div>`;

					divSub += `<div class="p-2  col-12  date_zonn champs_date_zonne child_${inp}"  style="display: none">
                                        <input type="text"   placeholder="{{date('d-m-Y')}} *" class="form-control">
                                </div>`;

					divSub += `<div class="p-2 date_zonn col-12 selection_date_zonne  child_${inp}" id="${inp}">
                         <div class="input-group date" >

                          <input type="text" class="form-control wf_datePicker" placeholder="{{date('d-m-Y')}} *"   readonly />
                          <div class="input-group-append">
                           <span class="input-group-text">
                            <i class="la la-calendar"></i>
                           </span>
                          </div>
                         </div>
                      </div>`
					break;
				case "reponsecourte":
					divSub += `<div class="child_reponsecourte col-12"><input type="text" class="form-control " placeholder="Text "></div>`
					break;
				case "title":
					divSub += ``
					break;
				case "paragraphe":
					divSub += `<div class="child_paragraphe col-12"><p style="height:100px" id="paragraphWf">Ajouter du contenu...</p></div>`
					break;
				case "message":
					divSub += `<div class="child_message col-12"><textarea style="height:100px" class="form-control " placeholder="Message "></textarea></div>`
					break;
				case "telephone":
					divSub += `<div class="form-group  col-12  child_telephone" id="telephone">
                                    <input type="text" required="" placeholder="123456789 " class="form-control">
                                </div>`
					break;
				case "identities":
					divSub += ` <div class="form-group col-lg-6 col-12 child_${inp}" id="${inp}">
                                <input type="text" placeholder='`+langChamp[inp]+`' class="form-control">
                             </div>`
					break;
				case "address":
					divSub += ` <div class="form-group col-lg-6 col-12 child_${inp}" id="${inp}">
                                <input type="text" placeholder='`+langChamp[inp]+`' class="form-control">
                             </div>`
					break;
				case "signature":
					divSub += ` <div class="form-group col-12 child_${inp}" id="${inp}">
                                    <div class="row w-100">
                                                <div class="form-group  mb-1 col-12  " >
                                                     <div id="sig" style="    width: 100% !important;
                                                                               height: 123px;
                                                                               border: 1px solid;"></div>
                                                     <textarea id="signatureArea" name="signed"  style="display: none"></textarea>
                                                </div>
                                                <div id="clear" class="ml-4 ">claire</div>
                                    </div>
                             </div>

`
					break;
				default:


					if(typchmp == "radio" || typchmp == "checkbox" ){
						elems.forEach((i)=>{
							if(i=="satisfaction"){
								divSub += `
                                                <div class="p-2 col   child_${inp}" id="${inp}">
                                                    <label class="${typchmp} ${typchmp}-outline ${typchmp}-lg ${typchmp}-success ">
                                                        <input type="${typchmp}" name="radios15"  />
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="p-2 col   child_${inp}" id="${inp}">
                                                    <label class="${typchmp} ${typchmp}-outline ${typchmp}-lg ${typchmp}-success ">
                                                        <input type="${typchmp}" name="radios15"  />
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="p-2 col   child_${inp}" id="${inp}">
                                                    <label class="${typchmp} ${typchmp}-outline ${typchmp}-lg ${typchmp}-success ">
                                                        <input type="${typchmp}" name="radios15"  />
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="p-2 col   child_${inp}" id="${inp}">
                                                    <label class="${typchmp} ${typchmp}-outline ${typchmp}-lg ${typchmp}-success ">
                                                        <input type="${typchmp}" name="radios15"  />
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="p-2 col   child_${inp}" id="${inp}">
                                                    <label class="${typchmp} ${typchmp}-outline ${typchmp}-lg ${typchmp}-success ">
                                                        <input type="${typchmp}" name="radios15" checked="checked" />
                                                        <span></span>
                                                    </label>
                                                </div>`;
							}else{
								divSub += `<div class="p-2 col-12   child_${inp}" id="${inp}">
                                    <label class="${typchmp} ${typchmp}-outline ${typchmp}-lg ${typchmp}-success ">
                                        <input type="${typchmp}" name="radios15" checked="checked" />
                                        <span></span>
                                       &nbsp; ${i}
                                    </label>
                                </div>`;
							}

						})
					}
					else if(typchmp == "captcha" ){

						divSub += `
                        <div class="form-group mt-4 mb-4">
                            <div class="captcha">
                                <span>
                                    ${imageCap}
                                </span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                            <input type="text" class="form-control col mt-2 mb-2">
                        </div>
                    `;
					}
					else if(typchmp == "checkbox_Privacy" ){

						divSub = `
                        <div class="p-2 col-12   child_${inp}" id="${inp}">
                            <label class=" ">
                              <div class="checkbox checkbox-outline checkbox-lg checkbox-success privacy_previews">
                                <input type="checkbox" name="radios15" checked="checked" />
                                <span></span>
                                &nbsp; &nbsp; <div class="text__1 ml-3">Oui, j'accepte que les données personnelles collectées soient conservées pendant 2 ans dans le cadre de la mise en relation avec l'entreprise pour accéder aux prestations qu'elle fournit</div>
                            </div>
                            </label>
                        </div>
                    `;

					}
					else if(typchmp == "time" ){

						divSub = `
                               <div class="form-group row timperkerparent data_index_heurs Element_heure w-100" data-index="0">
              <div class="col-12 child_${inp} child_24h  timepicker24">
                  <div class="input-group">
                      <input class="form-control kt_timepicker" id="kt_timepicker_2" readonly placeholder="Sélectionner l'heure " type="text"/>
                      <div class="input-group-append">
                        <span class="input-group-text">
                         <i class="la la-clock-o"></i>
                        </span>
                      </div>
                  </div>
             </div>


             <div class="col-12 child_${inp} type_date_desactive child_12h timepicker12"  >
               <div class="input-group ">
                      <input class="form-control kt_timepicker" id="kt_timepicker_3" readonly placeholder="Sélectionner l'heure " type="text"/>
                      <div class="input-group-append">
                        <span class="input-group-text">
                         <i class="la la-clock-o"></i>
                        </span>
                      </div>
                  </div>
               </div>

         </div>
                    `;

					}
					else if(typchmp == "select" ){

						divSub = `
                        <div class="form-group col-12">
                            <select class="form-control" id="exampleSelect1">
                                <option> option 1</option>
                            </select>
                        </div>
                    `;

					}
					else if(typchmp == "file" ){

						divSub = `
                        <div class="dropzone " style="padding: 0px 20px !important;" id="kt_dropzonejs_example_1">

                            <div class="dz-message needsclick">
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>


                                <div class="ms-4">
                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Déposez les fichiers ici ou cliquez pour télécharger.</h3>
                                    <span class="fs-7 fw-bold text-gray-400">Téléchargez jusqu'à 10 fichiers</span>
                                </div>
                            </div>
                        </div>
                    `;

					}
					else if(typchmp == "separateur" ){

						divSub = `<div class="col-12 separator separator-solid mt-8 mb-5"></div>`;
					}
					else if(typchmp == "media" ){

						divSub = `
                    <div class="form-group mb-1 col-12  child_media" id="media">
                        <div class="dropzone " style="padding: 0px 20px !important;" id="kt_dropzonejs_example_1">
                            <div class="dz-message needsclick">
                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                <div class="ms-4">
                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Déposez les fichiers ici ou cliquez pour télécharger.</h3>
                                    <span class="fs-7 fw-bold text-gray-400">Téléchargez jusqu'à 10 fichiers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
					}
					else if (typchmp == 'section') {

						divSub = `
                    <div class="dropzone col-8" ondrop="drop(event)" ondragover="allowDrop(event)" >
                        <div id="dddddd" class="container" >

                        </div>
                    </div>
                `;
					}
					else{
						divSub += ` <div class="form-group col-12 child_${inp}" id="${inp}">
                                <input type="text" placeholder='`+langChamp[inp]+` ' class="form-control">
                             </div> `;
					}
			}
		}

		function ChooseForEdit(key,id_effect,ele){
			id_chump.value = key.getAttribute("data-index")-1;
			document.querySelector('.feilds_formsEdit').style.display = 'block';
			document.querySelector('.field_message_error').classList.add('d-none');
			document.querySelector('.field_message_error').classList.remove('d-flex');
			document.querySelectorAll('.flields_edit').forEach((key)=>{
				key.setAttribute('style','display:none')
			})

			$('.navlink_add').removeClass('active')
			$('.navlink_set').addClass('active')

			document.getElementById(id_effect).style.display = "block"
			key.classList.remove('active')

			historyUpdate(id_chump.value,ele);

		}


		let inf = 0;
		// Display or hidden fields edite
		function btns_edit_efect(btn, id_effect ,ele=""){
			btn.forEach((key ,i)=>{

				if (key.getAttribute('listener') !== 'yes') {
					key.setAttribute('listener', 'yes');

					key.addEventListener('click',(e)=>{
						e.preventDefault();
						history_Obligatior (id_chump.value);
						ChooseForEdit(key,id_effect,ele)
						obligatior_Fun(check_obli,ele)


						if(key.getAttribute('data-name') == "caseacocher" || key.getAttribute('data-name') == "multiple"||
							key.getAttribute('data-name') == "menuderoulant" || key.getAttribute('data-name') == "satisfaction" || key.getAttribute('data-name') == "media"  ) {

							AddDataInArrAndBuild_MCD(id_chump.value,ele,{{$id}});
							Edit_DataInArrAndBuild_MCD(ele,{{$id}});
						}
						sortableTodoList(id_chump.value,ele)
					})
				}
			})
		}


		/*
		* To make history for each update field
		* */
		function historyUpdate(_index,ele){

			const type = data_fch[_index]['table'].split("_");

			history_namegroup(_index,data_fch[_index]['cols']['name_group'])
            history_titleVisible(_index,data_fch[_index]['cols']['name_group'])

			history_Checkbox(_index,type)
			history_Paragraphe(_index,type)
			history_Button(_index,type)
			history_Obligatior (_index)
			history_DateField(_index,type)
			history_Telephone(_index,type)
			history_HoursField(_index,type)
			history_importfichierField(_index,type)
			history_PrivaciesField(_index,type)
			history_MultipleField(id_chump.value,ele)
			history_IdentitiesAddress(id_chump.value,ele)
			if(ele == 'satisfaction'){
				history_Satisfication(id_chump.value,ele)
			}
		}


	</script>
	<script >
		let value_form_="";
		// for Switch between Date
		$.getJSON('{{asset('js/pages/forms/buildform/forms_webform_.json')}}',
			function (data) {
				// let value_form_
				$.each(data, function (key, value) {
					let datatyp = $('.date_deroulante_Cl01').attr('data-type');
					if(value.title == datatyp )
						value_form_ += value.forms
					setTimeout(()=>{
						$('.type_date_01').removeClass('type_date_desactive')
					},100)
				});

				$('.date_deroulante_Cl01').append(value_form_);
			})

	</script >
	@yield('alert')
	{{--    @yield('beforeScript')--}}

@endsection
