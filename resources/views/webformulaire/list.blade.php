<div class="rounded border">

	<div class="card  card-custom mt-10">
		<div class="card-header flex-wrap  pt-6 pb-6">
			<h3 class="card-label">
				{{ __('Liste des formulaires') }}
			</h3>
			<div class="card-toolbar">
				<a class="btn btn-light-primary btn-md btn-flat" id="myBtn"  href="#">
					@include('layouts.icons.plus') {{ __('Créer un nouveau formulaire') }}
				</a>
			</div>
		</div>

		<div class="card-body">
			<div class="mb-7">
				<div class="row align-items-center">
					<div class="col-lg-7 col-xl-6">
						<div class="row align-items-center">
							<div class="col-md-4 my-2 my-md-0">
								<div class="input-icon">
									<input type="text" class="form-control" placeholder="{{__('clients.search')}}" id="kt_datatable_search_query"/>
									<span>
										   <i class="flaticon2-search-1 text-muted"></i>
									   </span>
								</div>
							</div>
							<div class="col-md-4 my-2 my-md-0">
								<div class="d-flex align-items-center">
									<label class="mr-3 mb-0 d-none d-md-block">{{__('clients.Stat')}}:</label>
									<select class="form-control border" id="kt_datatable_search_status">
										<option value="">Tous</option>

										<option value="Actif">Actif </option>
										<option value="Désactiver">Désactiver </option>

									</select>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<table class="datatable datatable-bordered datatable-head-custom table-responsive  table-hover scrollx" id="kt_datatable2" >
				<thead>
				<tr>
					{{--                    <th da><span style="width: 100px">&nbsp;</span></th>--}}
					<th>Statut</th>
					<th>Titre</th>
					<th>Catégories</th>
					<th>Détails</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>

				@foreach($forms as $f )
					<tr>
						<td>
							{{@$form_->id}}
							<span class="switch switch-icon switch-sm switch-success ">
                                    <label>
                                     <input type="checkbox" @if($f->status == 1) checked="checked"  @endif name="select"
                                            value="{{$f->id}}" onchange="Changestatus(this) "/>
                                         <span></span>
                                        <div style="display: none">@if($f->status == 1) Actif @else Désactiver @endif</div>
                                    </label>
                                 </span>
						</td>
						<td>
							{{$f->title}} @if($f->index_>0) ({{$f->index_}}) @endif
						</td>
						<td>
							{{$f->categories->name}} @if($f->categories->index_>0) {{$f->categories->index_}}@endif
						</td>
						<td>
							<span>{{$f->detail}}</span>
						</td>
						<td>
							<div class="row mt-3 action_cate text-muted">

								<div class="col-1 mx-1 text-muted">
									<a class="text-primary cursor-pointer"
									   href="{{route('webformulaire.edite',[$clients_id,$f->id])}}"
									   title="Éditer" name="{{$f->id}}"   id="myBtn2">
										@include('layouts.icons.edit')
									</a>
								</div>
								<div class="col-1 mx-1 text-muted ">
									<a href="{{route('webformulaire.building',$f->id)}}" class="text-danger" title="Réglage"  id="effacer_btn"  >
										@include('layouts.icons.settings')
									</a>
								</div>
								<div class="col-1 mx-1 text-muted ">
									<a href="{{route('webformulaire.see',$f->id)}}" data-href="" title="Aperçus"
									   id="effacer_btn" >
										@include('layouts.icons.show')
									</a>
								</div>

								<div class="col-1 mx-1 text-muted">
									<a href="{{route('duplicate',$f->id)}}" title="Double" class="text-primary">
										@include('layouts.icons.duplicate')
									</a>
								</div>

								<div class="col-1 mx-1 text-muted ">
									<a href="#" class="text-danger"
									   name="{{route('forms_destroy',$f->id)}}"
									   title="Supprimer"
									   id="effacer_btn"
									   onclick="DeletConfig('{{route('forms_destroy',$f->id)}}')">
										@include('layouts.icons.delete')

									</a>
								</div>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>

@include('webformulaire.form')





@section('scripts')


	<script>
	     // !function for switch between if status active or desactive
	     function Changestatus(e){
		     $.ajax(
			     {
				     "url": `/admin/formulaires/update_status/${e.value}`,
				     "method": "get",
				     "data": {
					     status:e.checked?1:0,
					     _token:'{!! csrf_token() !!}'
				     }
			     }
		     ).then(function (data) {
			     if(data['status']===200){
				     alertDisplay('alert-light-success show','le formulaire ont été éditer avec succès')
			     }else{
				     alertDisplay('alert-light-danger show','Il n\'y a pas de produit')
			     }
		     });
	     }
	</script>


	<script>
	     var modal2 = document.getElementById("Formupdate");
	     var span_2 = document.getElementsByClassName("close")[1];

	     function updatefunction(e){
		     $.ajax(
			     {
				     "url": `/admin/formulaires/Forms/${e.value}`,
				     "method": "GET",

			     }
		     );
		     modal2.setAttribute('style','display:flex');

	     }

	     // span_2.onclick=() =>{
	     //     modal2.style.display = "none";
	     // }

	</script>






	<script src="{{ asset('/js/pages/crud/ktdatatable/base/data-form.js') }}" type="text/javascript"></script>

	<script src="{{ asset('/js/pages/my-script.js') }}" type="text/javascript"></script>


@endsection
