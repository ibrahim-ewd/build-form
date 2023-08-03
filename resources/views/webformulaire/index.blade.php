@extends('../welcome')
@section('title', env('APP_NAME').' - Webformulaires')





@section('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        .svg-icon.svg-icon-primary svg g [fill] {
            -webkit-transition: fill 0.3s ease;
            transition: fill 0.3s ease;
            fill: #ffffff !important;
        }
    </style>
@endsection

@section('page',"Webformulaires")


@section('content')

          @include('webformulaire.building.index')
@endsection






