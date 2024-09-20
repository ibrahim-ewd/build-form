
@extends('welcome')
@section('title', env('APP_NAME').' - Forms')


@section('active_Fo','active')


@section('styles')

<link rel="stylesheet" href="{{asset('css/style.css')}}">

<style>
    .dest-list {
        border: 1px solid;
    }

    .types {
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


@endsection

    <table class="table">
        <tr>
            <th>name</th>
            <th style="width:100px" colspan="2">action</th>
        </tr>
        @foreach($data as $key=>$value)
            <tr>
                <td>{{$value->name}}</td>
                <td  style="width:100px"><a href="{{route("form.build",$value->id)}}">edit</a></td>
                <td style="width:100px"><a href="{{route("form.reviews")}}?form={{$value->slug}}">review</a></td>
            </tr>
        @endforeach
    </table>


@section('scripts')

{{-- for build form    --}}
<script>
    let element = {!!  json_encode(config('webform.data_form'),true)  !!}
</script>
<script src="{{asset('/js/element-build.js')}}"></script>
<script src="{{asset('/js/build.js')}}"></script>
<script src="{{asset('/js/after-build.js')}}"></script>
<script src="{{asset('/js/ajax-form.js')}}"></script>
{{--    <script src="{{asset('/js/editing-form.js')}}"></script>--}}
<script src="{{asset('/js/forms.js')}}"></script>



@endsection
