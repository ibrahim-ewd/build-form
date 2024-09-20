@extends('welcome')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style-webform-v2.css')}}">

  {{--  <style>


        .check-list-warp span.check-list-item-img :checked + label:before {
            content: "✓";
            background-color: #2977ff;
            transform: scale(.6);
        }

        .check-list-warp span.check-list-item-img :checked + label img {
            transform: scale(0.9);
            /* box-shadow: 0 0 5px #333; */
            z-index: -1;
        }

        .starsRatings {
            color: #e0e0e0;
        }

        .starsRatings:hover {
            color: #bdbdbd;
        }

        .starsRatings.started {
            color: gold;
        }

        .itemStarsRating {
            width: max-content;
        }

        .itemRating {
            width: max-content;
        }

        .listRating,
        .listStarsRating {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }

        .check-list-warp span.check-list-item-img label img, .image-item-checkbox {
            margin-right: 0px !important;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            border: 1px solid #aaa8a8 !important;
            border-radius: .2rem;
        }

        .picture-md {
            max-width: 90px;
            max-height: 90px;
            width: 90px;
            height: 90px;
        }

        .picture-lg {
            max-width: 120px;
            max-height: 120px;
            width: 120px;
            height: 120px;
        }

        .picture-sm {
            max-width: 60px;
            max-height: 60px;
            width: 60px;
            height: 60px;
        }


        .check-list-warp span.check-list-item-img input[type="checkbox"],
        .check-list-warp span.check-list-item-img input[type="radio"] {
            display: none;
        }

        .check-list-warp span.check-list-item-img label {
            padding: 0 10px;
            display: block;
            position: relative;
            margin: 0 10px;
            cursor: pointer;
        }

        .check-list-warp span.check-list-item-img label:before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid #2977ff;
            position: absolute;
            top: -4px;
            left: -15px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
        }


    </style>--}}

@endsection
@section('content')

    @include('globals.tabs_elementsform_v2')


    <!-- Alert  -->
    @include('globals.alerts.success')
    @include('globals.alerts.danger-valid')


    <div class="card card-custom mt-10 page_build_webform">
        <div class="card-body body_scroll">
            <div
                id="templates_v" class="general-form templates_default form_default row
                templateIfram  " style="padding:15px;background:transparent">
                <div class="fade alert alert-custom " id="notificationSide" role="alert" style="
                                position: absolute;
                                top: 0px;
                                left: 50%;
                                height: max-content;
                                transform: translateX(-50%);
                                transform-origin: center;
                            ">
                    <div class="alert-text "> alerte !</div>
                </div>


                <form action="{{route("formulaires.data.store",$id)}}" enctype="multipart/form-data"
                      class="form w-100 FormSaveData" method="POST">

                    <div class="">
                        <h3 class="col-12 carsdfle title-form p-0" id="title-{{$id}}"
                            style="{{$form['stylesCss']['title']??''}}">
                            {{$form['title']}}
                        </h3>


                        <span class="col-12 ">
                                    <div class="alert-text description-form  mx-3"
                                         id="description-{{$id}}"
                                         style="{{$form['stylesCss']['description']??''}}">
                                        {{$form['detail']}}
                                    </div>
                              </span>
                    </div>


                    <div class="dest-list  col-12">

                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{asset('js/flashcanvas.js')}}"></script>
    <script src="{{asset('js/jSignature.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    {{--    <script src="{{asset('/js/data-init.json')}}"></script>--}}
    {{-- for build form    --}}

    <script>
        let ELEMENT_INIT_JSON;
        let URLGETDATAFORM   = "{{route('get.data.form.v2',$id)}}";
        let URL_ADD_DATAFORM = "{{route('add.data.form.v2',$id)}}";
        let URL_GET_VIEWEDIT = "{{route('get.view_edit.v2',$id)}}";
        let URL_UPLOAD_IMAGE = "{{route('upload.image.v2')}}";
        let URL_DELETE_IMAGE = "{{route('delete.image.v2')}}";
        let URL_FIlE_DATAINIT_JSON = "/js/data-init.json";
        let PAGE_NAME = "previews";
        let FORM_ID = {{$id}};
    </script>

    <script src="https://js.hcaptcha.com/1/api.js?hl=fr" async defer></script>



    <script src="{{asset('/js/element-build.js')}}"></script>
    <script src="{{asset('/js/build.js')}}"></script>
    <script src="{{asset('/js/ajax-form.js')}}"></script>
    {{--    <script src="{{asset('/js/editing-form.js')}}"></script>--}}
    <script src="{{asset('/js/forms.js')}}"></script>
    <script src="{{asset('/js/after-build.js')}}"></script>
    <script src="{{asset('/js/forms-previews.js')}}"></script>


@endsection
