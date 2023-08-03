@extends('welcome')
@section('title', env('APP_NAME').' - Forms')


@section('active_Fo','active')


@section('styles')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>
        .dest-list{
            border: 1px solid;
        }
        .types{
            display: flex;
            flex-direction: column;
        }
        .btn_dark_ {
            background: #ccc;
            color: #000;
        }

        .btn_dark_:hover {
            background: #000;
            color: #fff;
        }

        .type_date_desactive {
            display: none;
        }

        .hiddenElement {
            display: none;
        }

        .order_field {
            background: transparent !important;
            border: 0px;
            padding: 0 6px;
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

        .image-input .image-input-wrapper {
            width: 174px !important;
            height: 130px !important;
            border-radius: .5rem !important;
        }

        .btnsTodoList {
            display: flex;
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


    {{--    @include('globals.tabs_elementsform')--}}


    <!-- Alert  -->
    @include('globals.alerts.success')
    @include('globals.alerts.danger-valid')

    <div class="card card-custom mt-10">
        <div class="card-header border-0 pt-5">
            <div class="align-items-start flex-column">

            </div>
        </div>

        <div class="card-body body_scroll">
            <div class="row">

                <div class="col-4">
                    <div class="types">

                        @foreach($element as $key=>$type)
                            <p class="d-inline-flex gap-1">
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#{{$key}}" role="button"
                                   aria-expanded="false" aria-controls="{{$key}}">
                                    {{$key}}
                                </a>
                            </p>
                            <div class="collapse" id="{{$key}}">
                                <div class="card card-body">
                                    @foreach($type as $name=>$fields)
                                        <button class="btn-drag" data-type="{{$key}}" data-name="{{$name}}"  draggable="true" >
                                            {{$name}}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="dest-list col-7"  >
                    view
                </div>

            </div>

        </div>
        {{--   --}}
    </div>
@endsection





@section('scripts')

    {{-- for build form    --}}
    <script>
        let element = {!!  json_encode(config('webform.data_form'),true)  !!}
    </script>
    <script src="{{asset('/js/build.js')}}"></script>
    <script src="{{asset('/js/forms.js')}}"></script>



@endsection
