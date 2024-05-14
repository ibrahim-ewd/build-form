@extends('welcome')
@section('styles')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection
@section('content')

    <div class="dest-list dfgdfg col-7">

    </div>

@endsection
@section('scripts')

    <script src="{{asset('/js/element-build.js')}}"></script>
    <script src="{{asset('/js/build.js')}}"></script>
    <script src="{{asset('/js/after-build.js')}}"></script>
    <script src="{{asset('/js/ajax-form.js')}}"></script>
    {{--    <script src="{{asset('/js/editing-form.js')}}"></script>--}}
    <script src="{{asset('/js/forms.js')}}"></script>

@endsection
