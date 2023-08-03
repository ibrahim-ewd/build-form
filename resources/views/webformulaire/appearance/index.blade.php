@extends('../welcome')

<?php  $ispreview = true ?>

@section('breadcrumbs')
    {{ Breadcrumbs::render('webformulaire_apparence',[$form,Cookie::get('side')]) }}
@endsection

@section('page',"Webformulaires")

@section('content')


    @include('globals.tabs_elementsform')

    <!-- Alert  -->
    @include('globals.alerts.success')
    @include('globals.alerts.danger-valid')

    @if(isset($form['fields']))

        @if(empty($form['fields']))
            <div class="p-25">
                <h3> vous devez d'abord créer un formulaire</h3>
            </div>
        @else

            <div class="card card-custom mt-10">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        Configuration de l’apparence du formulaire
                                    </h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-5 order-sm-2">
                                        <div class="cardAccordion ">
                                            <form action="{{route('AppearanceStyles', $form['id'])}}" id="data_appar" method="POST">
                                                @csrf
                                                @include('webformulaire.appearance.include.form')
                                            </form>
                                            <div class="card-footer">
                                                <button type="submit" class="submit-data-appar btn btn-light-primary mr-2"  >
                                                    Sauvegarder
                                                </button>
                                                <button type="reset" data-href="{{route('reset.AppearanceStyles',$form['id'])}}" class="submit-data-reset btn btn-light mr-2"  >
                                                    Réinitialiser
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-7  order-sm-1 fieldForms" >
                                            <div class="card card-custom p-5 card_form">
                                                @include('webformulaire.templates.default')
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>

        @endif
    @endif

@endsection



@section('styles')
    <link rel="stylesheet" href="{{asset('/css/plugins/select2.min.css')}}" >

    <style >
        .card_form .child_nom,
        .card_form .child_prenom,
        .card_form .child_civilite,
        .wrapPreview .child_rue_one,
        .wrapPreview .child_rue_tow,
        .wrapPreview .child_pays,
        .wrapPreview .child_region,
        .wrapPreview .child_ville,
        .wrapPreview .child_code_Postal
        {
            padding-left: 0 !important;
        }

        .card_form.card.card-custom {
            -webkit-box-shadow: 0px 0px 30px 0px rgba(82, 63, 105, 0.05);
            box-shadow: 0px 0px 30px 0px rgba(82, 63, 105 ,0.1);
            border: 2px solid rgba(0, 0, 0, 0.3);
            padding: 0px !important;
            margin: 0px !important;
        }

        .form-group_description,
        .form-group_template,
        .form-group_Title{
            margin-bottom: 15% !important;
        }
        .form-group_Title>h4,
        .form-group_template>h4,
        .form-group_description >h4
        {

            margin-bottom: 5% !important;
        }
        .fieldForms{
            padding:0 2% !important;
        }
    </style >

@endsection

@section('scripts')


    <script src="{{asset('/js/plugins/dropzone-min.js')}}"></script>
    <script src="{{asset('/js/pages/crud/forms/widgets/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('/js/pages/crud/forms/widgets/bootstrap-datepicker.fr.js')}}"></script>


    <script src="{{asset('js/pages/forms/timePicker.js')}}"></script>
    <script src="{{asset('js/pages/forms/datePiker.js')}}"></script>
    <script src="{{asset('js/pages/crud/file-upload/dropzonejs.js')}}"></script>
    <script src="{{asset('/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('/js/pages/crud/forms/widgets/select2.js')}}"></script>
    <script src="{{asset('/js/plugins/Sortable.min.js')}}"></script>

{{--    //change template version--}}

    <script >

        //upload file background
        var imageBackground = ""
        var publicPath = "{{config('app.url')}}"






        $('#template_forms').change(function(){
            $('#templates_styles').attr('href',publicPath+'css/templates/'+$(this).val().split('/')[1]+'.css')
            $('#templates_v').removeClass();

            $('#templates_v').addClass('templates_'+$(this).val().split('/')[1] + ' form_' + $(this).find(':selected').attr('data-type'));
        })



    </script >

    <script src="{{asset('js/pages/forms/webform/print-date.js')}}" ></script >

    <script>



        $( document ).ready(function() {
            printStyleDimension(null)
            printStyleColor( null)
            printStyleBackground( null)
        });

        /*
        * Switch type background general form
        * */

        function typeBg(param){
            switch(param.val()){

                case 'image' :

                    $('.bg_ColImg').html(`
                        <div class="row">
                            <span class="col-4"> Background-image : </span>
                            <div class="col-8">
                                <div class="custom-file   @if(isset(json_decode($form['styles'])->formStyle->background_image)) d-none @endif">
                                    <input type="hidden" value="{{json_decode($form['styles'])->formStyle->background_image??''}}" name="formStyle[background_image]" id="customFileValue">
                                    <input type="file" value="" class="custom-file-input" accept="image/png, image/jpeg"  id="customFileBg"/>
                                    <label class="custom-file-label" >Choisissez l'image</label>
                                </div>
                                <div class="custom-image position-relative  {{json_decode($form['styles'])->formStyle->background_image??'d-none'}}">

                                    <label for="" @if(isset(json_decode($form['styles'])->formStyle->background_image)) style="background-image: url('{{json_decode($form['styles'])->formStyle->background_image}}')" @endif  class="custom-image-label"></label >
                                    <span class="remove-image-background btn btn-danger" data-image="{{json_decode($form['styles'])->formStyle->background_image??''}}">
                                        Supprimer l'image
                                    </span>
                                </div>
                            </div>
                        </div>
                    `)



                    $('#customFileBg').change(function() {

                        if (!this.files || !this.files[0]) return;

                        const FR = new FileReader();
                        FR.onload = function(evt) {

                            $.ajax({
                                'url':"{{route('uploadImagesBase64',$form['id'])}}",
                                'method':"POST",
                                'data':{
                                    'image':evt.target.result,
                                    'folder':'backround-webform',
                                    '_token':'{{ csrf_token() }}',
                                },
                                success:function (data) {
                                    $('.custom-image').removeClass('d-none')
                                    $('.custom-file').addClass('d-none')
                                    $('#customFileValue').val(data)
                                    $('.remove-image-background').attr('data-image',data)
                                    $('.custom-image-label').css("background-image", "url(" + data + ")")
                                    $('.general-form').css("background-image", "url(" + data + ")")
                                    // $('.custom-file-input').val('')
                                }
                            })
                        };

                        FR.readAsDataURL(this.files[0]);
                    })

                    $('.remove-image-background').click(function() {


                        $.ajax({
                            'url':"{{route('removeImagesBase64',$form['id'])}}",
                            'method':"POST",
                            'data':{
                                'image':$(this).attr("data-image"),
                                '_token':'{{ csrf_token() }}',
                            },
                            success:function (data) {
                                if(data['status']==200){
                                    $('.custom-image').addClass('d-none')
                                    $('.custom-file').removeClass('d-none')
                                    $('#customFileValue').val('')
                                    $('.remove-image-background').attr('data-image','')
                                    $('.general-form').css('background-image','')

                                    let myform = document.getElementById("data_appar");
                                    let fd = new FormData(myform );
                                    fd.append('_token', '{{ csrf_token() }}');

                                    $.ajax({
                                        'url':'{{route('AppearanceStyles',$form['id'])}}',
                                        'method':'POST',
                                        'data':fd,
                                        'processData': false,
                                        'contentType': false,
                                        success:function (data) {
                                            alertDisplay( 'show alert-light-success' , 'l\'image suppremer avec succès')
                                        }
                                    })

                                }else{
                                    alertDisplay( 'show alert-light-danger' , 'réessayez de supprimer l\'image')
                                }
                            }
                        })
                    });




                    break;
                case 'transparent' :

                        $('.bg_ColImg').html(` <input type="hidden" name="formStyle[background]" value="transparent" /> `)
                $('.general-form').css('background','transparent')

                    break;
                default:
                    $('.bg_ColImg').html(`
                             \t<label for="background_color__general-form" class="row">
\t\t\t\t\t\t\t\t\t<span class="col-4"> Background : </span>
                                    <div class="col-8">
\t\t\t\t\t\t\t\t\t<input type="color"
\t\t\t\t\t\t\t\t\t       name="formStyle[background_color]"
\t\t\t\t\t\t\t\t\t       class="form-control  EditApparence "
\t\t\t\t\t\t\t\t\t       value="{{json_decode($form['styles'])->formStyle->background_color??'#ffffff'}}"
\t\t\t\t\t\t\t\t\t       id="background__general-form"
\t\t\t\t\t\t\t\t\t       oninput="updateStyleBackground('general-form')" />
                                    </div>
\t\t\t\t\t\t\t\t</label>
                             `)
                    break;
            }
        }

        typeBg($('#selecBgType'))

        function switchToTransparent(param) {
            typeBg($(param))
        }
        //!_______________________________________
        function switchToTransparentElement(param){

            const el =  $('.bg_ColImgElement').find('.innerBg input');
            el.attr('data-value',el.attr('data-value'))
            switch($(param).val()){
                case 'color' :


                    el.attr('type','color').attr('readonly',false)
                        .val(el.attr('data-value'))
                    $("."+$(param).attr('data-elem')+'  a').css('background',el.attr('data-value'))

                    break;
                default:
                    el.attr('data-value',el.val())

                    $('.bg_ColImgElement').find('.innerBg input').attr('type','text').attr('readonly',true).val('transparent')
                    $("."+$(param).attr('data-elem')+'  a').css('background','transparent')
                    // break;
            }
        }





        const dimensions = ['top','right','left','bottom']



        /*
        * change text color
        * */
        function updateStyleColor(idElement) {
            printStyleColor( idElement)
        }

        function printStyleColor( idElement){

            let element
            let colorValue;

            if(idElement == "btn_Envoyer"){
                element = $('.'+idElement+' a')
            }else{
                element = $('.'+idElement)
            }
            colorValue = $('#color__' + idElement) .val()+' !important';


                element.css('color', colorValue);

        }

        //_____________________________________________________


        /*
         * change background color
         * */
        function updateStyleBackground(idElement) {
            printStyleBackground( idElement)
        }

        function printStyleBackground( idElement){

            let element
            let colorValue;

            if(idElement == "btn_Envoyer"){
                element = $('.'+idElement+' a')
            }else{
                element = $('.'+idElement)
            }
            colorValue = $('#background__' + idElement) .val();

                element.css('background-color', colorValue);

        }

        //_______________________________________________________


        /*
         * change Dimension | width height padding margin text-align
         * */
        function updateStyleDimension(idElement) {
            printStyleDimension( idElement)
        }

        function printStyleDimension( idElement){

            let element
            let colorValue ;
            let margin_;
            let padding_;
            let width_;
            let height_;
            let font_size_;
            let textAlign__;

            if(idElement == "btn_Envoyer"){
                element = $('.'+idElement+' a')
            }else{
                element = $('.'+idElement)
            }

            $.each(dimensions,(ind,dim)=>{
                margin_ = $('#margin_'+dim+'__' + idElement) .val();
                padding_ = $('#padding_'+dim+'__' + idElement) .val();
                width_ = $('#width__'+ idElement) .val()+"px";
                height_ = $('#height__'+ idElement) .val()+"px";
                font_size_ = $('#font_size__'+ idElement) .val();
                textAlign__ = $('#textAlign__'+ idElement) .val();

                if($('#width__'+ idElement) .val()==0){
                    width_ = 'max-content'
                }
                if($('#height__'+ idElement) .val()==0){
                    height_ = 'max-content'
                }

                element.css('margin-'+dim, margin_+"px");
                element.css('padding-'+dim, padding_+"px");
                element.css('width', width_);
                element.css('height', height_);
                element.css('font-size', font_size_+"px");
                $('.'+idElement).css('text-align', textAlign__);

            })







        }
        //_______________________________________________________




          /*
           * change inputs Select | font-weight font-family
           *
           * */
        function getSelectValue(idElement){

            if(idElement == "btn_Envoyer"){
                element = $('.'+idElement+' a')
            }else{
                element = $('.'+idElement)
            }

            const font_weight__ = $('#font_weight__' + idElement).val();
            const font_family__ = $('#font_family__' + idElement).val();

                element.css('font-weight', font_weight__);
                element.css('font-family', font_family__);

        }

        //___________________________________________________________





        $('.icon-drop-down').click(()=>{
            $('.icon-drop-down').toggleClass('icon-drop-down-switch ')
            $('.element-padding').toggleClass('d-none')
        })


    </script>

    <script>

        let cardsFieldsForm = document.querySelectorAll('.card-field'),
             section = document.querySelector('.dropZone-section');

        if(section!=null){
            section.addEventListener('dragover', (e)=>{
                e.preventDefault();

                let draggingCard = document.querySelector('.dragging');

                let cardAfterDraggingCard = getCardAfterDraggingCard(section, e.clientY);

                if(cardAfterDraggingCard){
                    cardAfterDraggingCard.parentNode.insertBefore(draggingCard, cardAfterDraggingCard);
                } else{
                    section.appendChild(draggingCard);
                }


            });

        }

        function getCardAfterDraggingCard(list, yDraggingCard){

            let listCards = [...list.querySelectorAll('.card-field:not(.dragging)')];
            return listCards.reduce((closestCard, nextCard)=>{
                let nextCardRect = nextCard.getBoundingClientRect();
                let offset = yDraggingCard - nextCardRect.top - nextCardRect.height /2;
                if(offset < 0 && offset > closestCard.offset){
                    indexSectionChildren();
                    return {offset, element: nextCard}
                } else{
                    indexSectionChildren();
                    return closestCard;
                }

            }, {offset: Number.NEGATIVE_INFINITY}).element;
        }

        cardsFieldsForm.forEach((card) => {
            registerEventsOnCard(card);
        })

        function registerEventsOnCard(card) {

            card.addEventListener('dragstart', (e) => { card.classList.add('dragging'); });

            card.addEventListener('dragend', (e) => { card.classList.remove('dragging'); });
        }

        function indexSectionChildren() {

            for (let i = 0; i < section.children.length; i++) {

                section.children[i].setAttribute('index-data', i)
            }
        }

    </script>

    <script src="{{asset('js/pages/forms/apparence/scripte.js')}}" ></script >




    @yield('beforescript')


@endsection
