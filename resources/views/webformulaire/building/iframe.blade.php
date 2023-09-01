@extends('welcome')
@section('styles')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection
@section('content')


    <div class="dest-list col-7">
        view
    </div>
@endsection
@section('scripts')

    <script src="{{asset('/js/build.js')}}"></script>
    <script src="{{asset('/js/ajax-form.js')}}"></script>
    <script src="{{asset('/js/forms.js')}}"></script>

@endsection
