@extends('welcome')
@section('title', env('APP_NAME').' - Forms')


@section('active_Fo','active')


@section('styles')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style-webform-v2.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>


    <style>
        .dest-list {
            border: 1px solid;
        }

        .dest-list {
            margin-left: 6%;
        }

        .dest-list label,
        .dest-list small {
            display: block;
        }

        .dest-list small {
            text-align: left;
            font-size: .75em;
            margin: 0 0 0 5px;
        }

        .fieldsForm {
            padding: 20px;
            border: 1px dotted rgba(42, 42, 42, 0.25);
            transition: 0.1s linear;
        }

        .fieldsForm:hover {
            border: 1px dotted rgba(42, 42, 42, 0.79);
            cursor: move;
        }
    </style>

@endsection

@section('page',"Webformulaires")

@section('content')





    <div class="card card-custom mt-10 page_build_webform">
        <div class="card-header border-0 pt-5">
            <div class="align-items-start flex-column">

            </div>
        </div>

        <div class="card-body body_scroll">
            <div class="row">

                <div class="col-4">
                    <div class="types">
                        <div class="accordion" id="accordionExample">

                        </div>
                    </div>
                </div>

                <div class="dest-list sortable-element col-7">

                </div>

            </div>
        </div>

    </div>

    <div id="premodal">
        <div id="editFields">

        </div>
        <div class="overlay" id="overlay"></div>
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
        let URLGETDATAFORM = "{{route('get.data.form.v2',$id)}}";
        let URL_ADD_DATAFORM = "{{route('add.data.form.v2',$id)}}";
        let URL_GET_VIEWEDIT = "{{route('get.view_edit.v2',$id)}}";
        let URL_UPLOAD_IMAGE = "{{route('upload.image.v2')}}";
        let URL_DELETE_IMAGE = "{{route('delete.image.v2')}}";
        let URL_FIlE_DATAINIT_JSON = "/js/data-init.json";
        let PAGE_NAME = "builder";
        let FORM_ID = {{$id}};


    </script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script src="{{asset('/js/element-build.js')}}"></script>
    <script src="{{asset('/js/build.js')}}"></script>
    <script src="{{asset('/js/after-build.js')}}"></script>
    <script src="{{asset('/js/ajax-form.js')}}"></script>
    {{--    <script src="{{asset('/js/editing-form.js')}}"></script>--}}
    <script src="{{asset('/js/forms.js')}}"></script>



@endsection
