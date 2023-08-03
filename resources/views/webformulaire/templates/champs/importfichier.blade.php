@if(isset($steps))
	@php
		$f['importfichier'] = $formById[$steps]['importfichier'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['importfichier'])  && $f['importfichier'] !="0" )

	<div class="form-group  mb-1 col-12  field_{{$k}}  child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" >
			@if(request()->is('admin/notification/*'))
			<h4  style="font-weight: bold;font-size: 24px">{{$f['name_group']}}</h4>
		@endif

		<div class="dropzone  myInputs myInputs_importFile  " id="wf_upload_file" data-title="{{$f['name_group']}}">
			<label for="id_files_upload_wf" class="class_label_files_upload_wf" >
				<h3 class="fs-5 fw-bolder text-gray-900 mb-1">Déposez les fichiers ici ou cliquez pour télécharger.</h3>
				<span class="fs-7 fw-bold text-gray-400">Téléchargez jusqu'à {{$f['numberFicher']}} fichiers </span>
				<input type="file" name="files[]"
				       data-title="{{$f['name_group']}}"
				       class="wf_upload_file_input d-none myInputs " onchange="checkFiles(this.files,this)"
				       id="id_files_upload_wf" multiple
				       accept="@foreach(json_decode($f['extension'])??[] as $el) {{$el.','}} @endforeach"

				       data-length="{{$f['numberFicher']??''}}"
				       data-size="{{$f['max_size']??''}}"
				       data-extension="{{$f['extension']??''}}">
			</label >
		</div>
	</div>
@endif
