<!-- Modal to edit a notification -->
@foreach($notifications as $key => $notification)
    <div class="modal fade update__notification_modal"
         id="update__notification_{{$notification['id']}}"
         tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop"
         aria-hidden="true"
         data-index="{{$key}}"
    >
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">

                <form action="{{route('UpdateNotification', $notification['id'])}}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Éditer : {{$notification['title']}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>

                    <div class="modal-body">

                            <div class="form-group mb-4">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input"
                                           @if($notification['send_to_final_user']) checked @endif
                                           value="{{$notification['send_to_final_user']}}"
                                           id="send_to_final_user_edit_{{$key}}" @if($cantSendToFinalUser) disabled @endif />

                                    <input type="hidden" value="{{$notification['send_to_final_user']}}" class="send_to_final_user_class_edit"  name="send_to_final_user">

                                    <label class="custom-control-label" for="send_to_final_user_edit_{{$key}}">
                                        Envoyer cette notification aux utilisateurs finaux
                                    </label>
                                </div>
                            </div>

                         <div class="form-group mb-4 send-to-final-user">
                                <label for="sendToEmail-{{$notification['id']}}_notification" class="col-lg-4 col-12 col-form-label">
                                    Envoyer à l'e-mail
                                    <span class="text-danger">*</span></label>


                                <div class="p-0 col-12 myselect2">


                                    <select class="form-control sendToEmail_notification sendToEmail_notification_edit" id="sendToEmail_notification_edit_{{$key}}"
                                            name="sendToEmail_notification[]"
                                            placeholder="Admin email" multiple="multiple">

                                        @if(json_decode($notification['sendTo'])!=null)
                                            @foreach(json_decode($notification['sendTo']) as $email)

                                                <option value="{{$email}}" selected >{{$email}}</option >
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>


                         <div class="form-group mb-4 send-to-user_edit">
                                <label for="replyToEmail-{{$notification['id']}}_notification" class="col-lg-4 col-12 col-form-label">
                                    Répondre à
                                    <span class="text-danger">*</span></label>
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="replyToEmail-{{$notification['id']}}_notification"
                                    name="replyToEmail_notification"
                                    value="{{$notification['replyTo']}}"
                                >
                            </div>



                        <div class="form-group mb-4">
                            <label for="subject-{{$notification['id']}}_notification" class="col-lg-4 col-12 col-form-label">
                                Sujet
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="subject-{{$notification['id']}}_notification"
                                name="subject_notification"
                                value="{{$notification['subject']}}"
                            >
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
                                        >{{$notification['message']}}</textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-light-primary">Mettre à jour</button>
                        <button type="button" class="btn btn-default font-weight-bold close-edit-modals" data-dismiss="modal">Fermer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endforeach
