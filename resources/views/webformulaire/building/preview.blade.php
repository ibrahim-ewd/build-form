@extends('welcome')
@section('title', env('APP_NAME').' - Aperçu du formulaire')


@section('breadcrumbs')
    {{ Breadcrumbs::render('webformulaire_afficher',[$form,Cookie::get('side')]) }}
@endsection


@section('active_Con','active')
<?php $ispreview = true; ?>
@section('styles')
    <link rel="stylesheet" href="{{asset('css/templates/default.css')}}" >

    <style>
        .wrapPreview .child_nom,
        .wrapPreview .child_prenom,
        .wrapPreview .child_civilite,
        .wrapPreview .child_rue_one,
        .wrapPreview .child_rue_tow,
        .wrapPreview .child_pays,
        .wrapPreview .child_region,
        .wrapPreview .child_ville,
        .wrapPreview .child_code_Postal
        {
            padding-left: 0 !important;
        }
    </style>


<?php
//        $isIfram = true;
        $ispreview = true
?>


@section('page',"Webformulaires")

@section('content')


        @include('globals.tabs_elementsform')

    <!-- end .flash-message -->
    <!-- Alert success -->
    @include('globals.alerts.success')
    <!-- Alert success -->
    <!-- Alert danger valid -->
    @include('globals.alerts.danger-valid')
    <!-- Alert danger valid -->
    <!-- end .flash-message -->

    @if(count($form['fields']) > 0 )
        <div class="card card-custom mt-10 mb-20">
                <div class="container wrapPreview cl_conditions" data-conditions="{{$form['conditions']}}" style=" ">
                    @include('webformulaire.templates.default')
                </div>
        </div>

        <div class="card  card-custom mt-10">
            <div class="card-header flex-wrap  pt-6 pb-6">
                <h3 class="card-label">
                    iFrame
                </h3>
            </div>

            <div class="card-body card-body-wf">
                <p class="card-text u-noMargin">Utilisez ce code pour intégrer votre formulaire dans un iFrame au sein de votre page.</p>
                    <div>
                            <div class="mainCard">
                                <textarea class=" js-copytextarea " readonly><iframe src="{{env('APP_URL').'form/'.$form['id']}}" id="iframeForm" style="width:100%;height: 700px;" frameborder="0"></iframe></textarea>
                            </div>
                            <div class="mainCard mainCard--action mt-3">
                                <a class="btn btn-light-primary js-textareacopybtn">
                                    <span class="svg-icon  svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M17.2718029,8.68536757 C16.8932864,8.28319382 16.9124644,7.65031935 17.3146382,7.27180288 C17.7168119,6.89328641 18.3496864,6.91246442 18.7282029,7.31463817 L22.7282029,11.5646382 C23.0906029,11.9496882 23.0906029,12.5503176 22.7282029,12.9353676 L18.7282029,17.1853676 C18.3496864,17.5875413 17.7168119,17.6067193 17.3146382,17.2282029 C16.9124644,16.8496864 16.8932864,16.2168119 17.2718029,15.8146382 L20.6267538,12.2500029 L17.2718029,8.68536757 Z M6.72819712,8.6853647 L3.37324625,12.25 L6.72819712,15.8146353 C7.10671359,16.2168091 7.08753558,16.8496835 6.68536183,17.2282 C6.28318808,17.6067165 5.65031361,17.5875384 5.27179713,17.1853647 L1.27179713,12.9353647 C0.909397125,12.5503147 0.909397125,11.9496853 1.27179713,11.5646353 L5.27179713,7.3146353 C5.65031361,6.91246155 6.28318808,6.89328354 6.68536183,7.27180001 C7.08753558,7.65031648 7.10671359,8.28319095 6.72819712,8.6853647 Z" fill="#000000" fill-rule="nonzero"/>
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-345.000000) translate(-12.000000, -12.000000) " x="11" y="4" width="2" height="16" rx="1"/>
                                            </g>
                                        </svg>
                                    </span>
                                    Copy Code
                                </a>
                            </div>
                    </div>
            </div>
        </div>
    @else
        <div class="p-25">
            <h3> vous devez d'abord créer un formulaire</h3>
        </div>
    @endif
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/templates/default.css')}}" >

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        .order_field{
            background: transparent;
            border: 0;
        }

    </style>

@endsection


@section('scripts')

    <script src="{{asset('js/pages/forms/apparence/scripte.js')}}" ></script >
    <script src="{{asset('js/pages/forms/datePiker.js')}}" ></script >
    <script src="{{asset('js/pages/forms/timePicker.js')}}" ></script >
{{--    <script src="{{asset('js/pages/forms/webform/function-conditional.js')}}" ></script >--}}

{{--    <script src="{{asset('js/pages/forms/buildform/globale_Function.js')}}" ></script >--}}

    <script >
        var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

        copyTextareaBtn.addEventListener('click', function(event) {
            var copyTextarea = document.querySelector('.js-copytextarea');
            copyTextarea.focus();
            copyTextarea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy');
            }
        });

        resizeChamp([
            'address',
            'identities',
        ]);
    </script >

    @yield('beforescript')
@endsection
