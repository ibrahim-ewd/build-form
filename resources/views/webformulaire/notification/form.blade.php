

<!-- Modal to add new notification -->
<div class="modal fade"
     id="add__notification_01"
     tabindex="-1" role="dialog"
     aria-labelledby="staticBackdrop"
     aria-hidden="true"
>

	<div class="modal-dialog modal-lg " role="document">

		<form action="{{route('notification.create', $id)}}" method="POST" id="idForm" enctype="multipart/form-data">
			@csrf
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nouvelle notification</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close"></i>
					</button>
				</div>

				<div class="modal-body">
                    <div class="form-group mb-4">
                        <div class="custom-control custom-switch">

                            <input type="checkbox" class="custom-control-input"
                                   id="send_to_final_user" @if($cantSendToFinalUser) disabled @endif />
                            <input type="hidden" value="off" class="send_to_final_user_class"  name="send_to_final_user">
                            <label class="custom-control-label" for="send_to_final_user">
                                Envoyer cette notification aux utilisateurs finaux
                            </label>
                            @if($cantSendToFinalUser)
                                <div class="text-muted">
                                    Pour utiliser cette option, il faut ajouter le champ "email" au formulaire, et qu'il soit obligatoire.
                                </div>
                            @endif
                        </div>

                    </div>
					<div class="form-group mb-4">
						<label for="title_notification" class="col-lg-4 col-12 col-form-label">
							Titre <span class="text-danger">*</span>
						</label>

						<input
							type="text"
							class="form-control"
							id="title_notification"
							name="title_notification"
                            value="{{$form['title']}}"
							placeholder="Nouvelle soumission de ..."
						>
						<span class="text-danger" id="title_error"></span>
					</div>

					<div class="form-group mb-4 send-to-final-user">

						<label for="sendToEmail_notification" class="col-lg-4 col-12 col-form-label">
							Envoyer à l'e-mail <span class="text-danger">*</span></label>

						<div class="p-0 col-12 myselect2">
							<select class="form-control sendToEmail_notification" id="sendToEmail_notification"
							        name="sendToEmail_notification[]"
							        placeholder="Admin email"  multiple="multiple">
                                <option value="{{$Profil['email']??''}}" selected >{{$Profil['email']??''}}</option >
							</select>
						</div>

						<span class="text-danger" id="sendToEmail_error"></span>
					</div>


					<div class="form-group mb-4 send-to-user">
						<label for="replyToEmail_notification" class="col-lg-4 col-12 col-form-label">
							Répondre à
                            <span class="text-danger">*</span></label>
						</label>

						<input
							type="email"
							class="form-control"
							id="replyToEmail_notification"
							name="replyToEmail_notification"
                            value="{{$Profil['email']??''}}"
							placeholder="email@gmail.com"
						>
						<span class="text-danger" id="replyToEmail_error"></span>
					</div>

					<div class="form-group mb-4">
						<label for="subject_notification" class="col-lg-4 col-12 col-form-label">
							Sujet <span class="text-danger">*</span>
						</label>
						<input
							type="text"
							class="form-control"
							id="subject_notification"
							name="subject_notification"
							placeholder="Nouvelle soumission de ..."
                            value="Demande de contact"
							{{--oninput="checkboxDisabled(this)"--}}
						>
						<span class="text-danger" id="subject_error"></span>
					</div>
					<div class="form-group mb-4">
						<label><strong>Champs :</strong></label><br/>
						<div>
							<label for="selectAll">
								<input type="checkbox" name="selectAll" id="selectAll" checked="checked" onchange="checkAll(this)">
								Tout Sélectionner
							</label>
						</div>

						<div id="checkboxes">


							@if(isset($form['fields']))
								@foreach ($form['fields'] as $key => $f)
                                    @if($f['typeChamp'] != 'privacy')
                                        <div class="ml-5" style="user-select: none">
                                            <label for="checkbox_{{$key}}">
                                                <input type="checkbox" name="checkbox_{{$key}}"
                                                       id="checkbox_{{$key}}"
                                                       checked="checked"
                                                       class="checkbox_Champs"
                                                       onchange="checkThis(this)">
                                                {{ $f['name_group'] }}
                                            </label>
                                        </div>
                                    @endif
								@endforeach
							@endif


						</div>
					</div>
					<div class="form-group mb-4">
						<div class="card card-custom border">
							<div class="card-body">
								<div id="editor">

                                        <textarea
	                                        class="my-editor  wisiwig-content form-control"
	                                        id="my-editor"
	                                        name="message_notification"
	                                        cols="30"
	                                        rows="10"
                                        ></textarea>
								</div>
								<span class="text-danger" id="message_error"></span>
							</div>
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-light-primary" id="submit">Ajouter</button>
					<button type="button" class="btn btn-default font-weight-bold " data-dismiss="modal">Fermer</button>
				</div>

			</div>
		</form>
	</div>
</div>
