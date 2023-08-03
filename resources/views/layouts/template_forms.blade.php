<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php   $ispreview = true ?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf_token" content="{{ csrf_token() }}" />

	<title>@yield('title')</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"  />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />

	<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
{{--	<link href="{{ asset('css/style_iframe.css') }}" rel="stylesheet" type="text/css" />--}}
	<link href="{{asset('css/templates/'.explode('/',$form['template']??'/default')[1].'.css')}}" rel="stylesheet" >
	<link href="{{asset('/media/logos/Logo-WF_icon.png')}}" rel="icon" >
    <style>
        .btn_dark_ {
            background: #ccc ;
            color: #000 ;
        }
        .btn_dark_:hover {
            background: #000 ;
            color: #fff ;
        }
        .general-form{
            /*-webkit-box-shadow: 0px 0px 30px 0px rgba(82, 63, 105, 0.05);*/
            /*box-shadow: 0px 0px 30px 0px rgba(82, 63, 105 ,0.1);*/
            /*border: 2px solid rgba(0, 0, 0, 0.3);*/
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }
    </style>
	@yield('styles')

</head>
<body style="background: transparent;overflow: hidden" id="iframe_content">


<?php $isIfram = true; ?>


<div class="d-flex flex-column flex-root cl_conditions"  data-conditions="{{$form['conditions']}}">

	@include('webformulaire.templates.default')

</div>



<script src="{{asset('/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('/js/scripts.bundle.js')}}"></script>
<script src="{{asset('/js/pages/forms/webform/function-conditional.js')}}"></script>
<script src="{{asset('/js/scripte.js')}}"></script>




@yield('scripts')
@yield('beforescript')

	<script src="{{asset('js/pages/forms/webform/jquery.picky.js')}}" ></script>
	<script>
		$(document).ready(function () {
			$(".date").picky();
		});
	</script>


</body>
</html>




