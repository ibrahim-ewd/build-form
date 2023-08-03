@extends('../welcome')
@section('title', env('APP_NAME').' - Forms')
@section('breadcrumbs', Breadcrumbs::render('webformulaire_notification',[$form,Cookie::get('side')]) )

@section('active_Fo','active')

@section('styles')

    <link rel="stylesheet" href="{{asset('plugins/custom/uppy/uppy.bundle.css')}}">
    <style >
        .myselect2 span.select2-selection.select2-selection--multiple{
            width: max-content;
            height: max-content;
            max-width: 100%;
            min-width: 100%;
        }
    </style >
@endsection

@section('page',"Webformulaires")

@section('content')


    @include('globals.tabs_elementsform')

    <!-- end .flash-message -->
        <!-- Alert success -->
    @include('globals.alerts.success')
    @include('globals.alerts.danger-valid')

    <div class="rounded border">

        <div class="card  card-custom mt-10">
            <div class="card-header flex-wrap  pt-6 pb-6">
                <h3 class="card-label">
                    <span class=" mt-1 fw-bold fs-7">Notifications  : </span>
                    <span class="text-muted card-label fw-bolder fs-3 mb-1">{{$form['title']}}</span>
                </h3>
                <div class="float-right">
                    <a href="#" id="myBtn"
                       data-toggle="modal"
                       data-target="#add__notification_01"
                       class="btn btn-light-primary">
                        @include('layouts.icons.plus') {{ __('Ajouter une nouvelle notification') }}
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
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table" id="kt_datatable_notification">
                    <thead>
                    <tr>
                        <th >Statu</th>
                        <th >Titre</th>
                        <th >Sujet</th>
                        <th >Actions</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyChild">

                    @foreach($notifications as $key => $notification)
                        <tr>
                            <td scope="row">
                                <form class="form">
{{--                                    <div class="form-group row">--}}
{{--                                        <div class="col-3">--}}
                                            {{@$form_->id}}
                                            <span class="switch switch-icon switch-sm switch-success">
                                                    <label>
                                                     <input type="checkbox" @if($notification->status == 1) checked="checked"  @endif name="select"
                                                            value="{{$notification->status}}"
                                                            onchange="Changestatus(this,'{{$notification->id}}') "/>


                                                         <span></span>
                                                        <div style="display: none">@if($notification->status == 1) Actif @else Désactiver @endif</div>
                                                    </label>
                                                 </span>

{{--                                        </div>--}}
{{--                                    </div>--}}
                                </form>
                            </td>
                            <td>
                                    {{$notification['title']}}
                            </td>
                            <td>
                                {{$notification['subject']}}
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-1 mx-1 text-muted">
                                        <a class="text-primary cursor-pointer"
                                           title="Éditer"
                                           data-toggle="modal"
                                           data-target="#update__notification_{{$notification['id']}}"
                                           id="myBtn2">
                                            @include('layouts.icons.edit')
                                        </a>
                                    </div>

                                    <div class="col-1 mx-1 text-muted ">
                                        <a href="#" class="text-danger"
                                           name="{{route('DeleteNotification', [$notification['id']])}}"
                                           title="Supprimer"
                                           id="effacer_btn"
                                           onclick="DeletConfig('{{route('DeleteNotification', [$notification['id']])}}')">
                                            @include('layouts.icons.delete')
                                        </a>
                                    </div>

                                    <div class="col-1 mx-1 text-muted">
                                        <a href="{{route('DuplicateNotification', [$notification['id'], $notification['form_id']])}}" title="Double" class="text-primary">
                                            @include('layouts.icons.duplicate')
                                        </a>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                    @if(isset($form['fields']))
                        <div class="field_form" style="display: none">
                            @foreach ($form['fields'] as $k => $f)
                                @include('webformulaire.templates.champs.'.$f['typeChamp'])
                            @endforeach
                        </div>
                    @endif

            </div>
        </div>
    </div>



    @include('webformulaire.notification.form')

    @include('webformulaire.notification.edit')




@endsection

@section('scripts')

    @push('scripts')
        <script src="{{ asset('/js/pages/crud/ktdatatable/base/data-notification.js') }}" type="text/javascript"></script>


        <script >
            $("#sendToEmail_notification").select2({
                tags: true,
                tokenSeparators : [',', ';', ' ', '\n', '\t']
            })

            $.each($(".sendToEmail_notification_edit"),(index,el)=>{

                $("#sendToEmail_notification_edit_"+index).select2({
                    tags: true,
                    width: '100%',
                    tokenSeparators : [',', ';', ' ', '\n', '\t']
                })
            })



        </script >

        <script>
            // !function for switch between if status active or desactive
            function Changestatus(e,id){
                $.ajax(
                     {
                         "url": "mise-a-jour-statut/"+id,
                         "method": "POST",
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

            let iFrames = document.getElementsByTagName("iframe"),
                checkBoxes = document.querySelectorAll('#checkboxes input[type="checkbox"]'),
                fieldArray = [];


            function addToIframe(indexCheckBox, index) {
                iFrames[index].contentDocument.body.html = "";

                let fieldClass = 'field_' + indexCheckBox;

                let fieldElement = document.querySelector(`.${fieldClass}`);
                let cloneNode = fieldElement.cloneNode(true);

                let h4 = cloneNode.querySelector("h4");
                let div = document.createElement('div');

                div.classList.add(fieldClass);
                // div.appendChild(h4);

                if(cloneNode.classList.contains("multipleClone")){
                    let title = cloneNode.dataset.title;

                    let par = document.createElement("p");
                    let span = document.createElement("span");
                    let b = document.createElement("b");

                    let t = document.createTextNode( title + " : " );
                    let b_value = document.createTextNode( cloneNode.dataset.value);
                    span.appendChild(t);
                    b.appendChild(b_value);

                    par.appendChild(span);
                    par.appendChild(b);


                    div.appendChild(par);

                }else{

                    let inputElements = cloneNode.querySelectorAll("input, select, checkbox, textarea");

                    inputElements.forEach(element => {

                        let title = element.dataset.title;
                        let par = document.createElement("p");
                        let span = document.createElement("span");
                        let b = document.createElement("b");

                        let t = document.createTextNode( title + " : " );
                        let b_value = document.createTextNode( element.dataset.value);
                        span.appendChild(t);
                        b.appendChild(b_value);

                        par.appendChild(span);
                        par.appendChild(b);
                        div.appendChild(par);
                    });
                }



                iFrames[index].contentDocument.body.appendChild(div);

            }

            function removeFromIframe(indexCheckBox, index) {
                iFrames[index].contentDocument.body.querySelector(`.field_${indexCheckBox}`).remove();
            }




            function checkAll(selectAll) {

                if(selectAll.checked) {

                    checkBoxes.forEach((checkbox) => {

                        checkbox.checked = true;
                        checkThis(checkbox)
                    })

                } else {
                    checkBoxes.forEach((checkbox) => {

                        checkbox.checked = false;
                        checkThis(checkbox)
                    })
                }
            }

            $('#myBtn').click(()=>{
                iFrames[0].contentDocument.body.innerHTML = ""
                checkBoxes.forEach((checkbox) => {

                    checkbox.checked = true;
                    checkThis(checkbox)
                })
            })


            function checkThis(thisCheckBox) {




                let idCheckBox = thisCheckBox.getAttribute("id"),
                    indexCheckBox = idCheckBox.split('_')[1],
                    fieldClass = 'field_' + indexCheckBox,
                    fieldElement = document.querySelector('.' + fieldClass);


                var Checked = true;

                if(thisCheckBox.checked) {

                    fieldArray.push(indexCheckBox)
                    addToIframe(indexCheckBox, 0);

                    $('.checkbox_Champs').each(function(index){
                        if($(this).is(':checked')==false){
                            Checked = false;
                        }
                        if(Checked==true){
                            $('#selectAll').prop('checked', true);
                        }
                    })
                } else {
                    $('#selectAll').prop('checked', false);

                    for(let i = 0; i < fieldArray.length; i++) {

                        if(fieldArray[i] == indexCheckBox) {

                            fieldArray.splice(i, 1);
                            removeFromIframe(indexCheckBox, 0);
                            break;
                        }
                    }

                    // iFrames[0].contentDocument.body.querySelector(`#${fieldClass}`).remove();
                }

            }

            // Delete <p><br /> & <div><br />
            setTimeout(() => {


                for(let i = 0; i < iFrames.length; i++) {

                    let iframeBody = iFrames[i].contentDocument.body,
                        iframePBr = iframeBody.querySelectorAll('p br'),
                        iframeDivBr = iframeBody.querySelectorAll('div br');

                    if(iframePBr.length > 0 || iframeDivBr.length > 0) {

                        iframePBr.forEach((br) => {   br.parentNode.remove();  });
                        iframeDivBr.forEach((br) => {   br.parentNode.remove();  });
                    }
                }
            }, 1000);


        </script>

        <script>

            setTimeout(() => {

                let modalEdit = document.querySelectorAll('.id__modal ');

                for(let i = 1; i < iFrames.length; i++) {
                    if(modalEdit[i-1]){

                        iFrames[i].contentDocument.body.innerHTML = modalEdit[i-1].value

                    }
                }

            }, 600);

        </script>

{{--    Delete notification    --}}
        <script>
            $(".delete-notification").each(function() {

                let element = $(this);

                element.click( function (e) {

                    e.preventDefault(); // avoid to execute the actual submit of the form.

                    $.ajax({
                        type: 'GET',
                        url: element.attr('href'),
                        success: function() {

                            element.parent().parent().remove();
                        },
                        error: function(error) {

                            console.log('Not deleted')
                        },
                    });
                })
            });
        </script>

{{--
    /*
     * Validation Form
     * Add new notification
     */
--}}
        <script>
            $("#idForm").submit(function(e) {

                e.preventDefault();

                setTimeout(() => {

                    let form = $(this);
                    let actionUrl = form.attr('action');

                    $.ajax({

                        type: "POST",
                        url: actionUrl,
                        data: form.serialize(), // serializes the form's elements.
                        success: function(data) {
                            setTimeout(() => {
                                location.reload()
                            }, 300);
                        },
                        error: function(error) {
                            $('.text-danger').text('');
                            $('.form-control').css("border-color", '#e4e6ef');


                            let dataError = error.responseJSON.errors;
                            function errorElement(errorElement, inputElement, msg) {
                                $('#' + errorElement).text(msg);
                                $('#' + inputElement).css("border-color", 'red');
                            }


                            for (const property in dataError) {
                                if (property) {

                                    let str = property.split('_'),
                                        spanError = str[0] + '_error';
                                    errorElement(spanError, property, dataError[property]);
                                }
                            }

                        }
                    });
                }, 300);
            });


            $('.update__notification_modal').on('shown.bs.modal', function (e) {
                $.each($(this),function(index,elem){

                    // $('.send-to-user_edit').find('input').attr('data-email',$('.send-to-user_edit').find('input').val())


                    if($('#send_to_final_user_edit_'+$(this).attr('data-index')).is(':checked')){

                        $('.send-to-final-user').hide();
                        $('.send-to-user_edit').show();

                        // $('.send-to-user_edit').find('input').val($('.send-to-user_edit').find('input').attr("data-email"));

                    }else{

                        $('.send-to-final-user').show();
                        $('.send-to-user_edit').hide();

                        // $('.send-to-user_edit').find('input').val('__to_sender__');

                    }
                    // $('.send-to-user_edit').find('input').attr('data-email',$('.send-to-user_edit').find('input').val())

                    $('#send_to_final_user_edit_'+$(this).attr('data-index')).on('change.bootstrapSwitch', function (e) {
                        if(e.target.checked) {
                            $('.send-to-final-user').hide();
                            $('.send-to-user_edit').show();
                            $('.send_to_final_user_class_edit').val('on')
                            //                         $('.send-to-user_edit').find('input').val($('.send-to-user_edit').find('input').attr("data-email"));

                        } else {
                            $('.send-to-final-user').show();
                            $('.send-to-user_edit').hide();
                            $('.send_to_final_user_class_edit').val('off')
                            // $('.send-to-user_edit').find('input').val('__to_sender__');

                        }

                        console.log($('.send-to-user_edit').find('input').val())
                    });
                });
            })


            $('.send-to-user').hide();

            $('#send_to_final_user').on('change.bootstrapSwitch', function (e) {
                if(e.target.checked) {
                    $('.send-to-final-user').hide();
                    $('.send_to_final_user_class').val('on')
                    $('.send-to-user').show();
                } else {
                    $('.send-to-final-user').show();
                    $('.send_to_final_user_class').val('off')
                    $('.send-to-user').hide();
                }
            });





            // function sendToUser(el){
            //     if(el) {
            //         $('.send-to-final-user').hide();
            //         $('.send_to_final_user_class_edit').val('on')
            //         $('.send-to-user').show();
            //     } else {
            //         $('.send-to-final-user').show();
            //         $('.send-to-user').hide();
            //         $('.send_to_final_user_class_edit').val('off')
            //     }
            // }
            //
            // function sendToResend(el){
            //     if(el) {
            //         $('.send-to-final-user').hide();
            //         $('.send_to_final_user_class_edit').val('on')
            //         $('.send-to-user').show();
            //     } else {
            //         $('.send-to-final-user').show();
            //         $('.send-to-user').hide();
            //         $('.send_to_final_user_class_edit').val('off')
            //     }
            // }








        </script>


    @endpush
    @stack('scripts')
@endsection
