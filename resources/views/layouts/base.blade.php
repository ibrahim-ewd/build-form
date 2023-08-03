<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Fonts -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
	
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    
	<link rel="icon" href="{{asset('/media/logos/Logo-WF_icon.png')}}">

    @yield('styles')

</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading" >







<!--begin::Main-->
<div class="d-flex flex-column flex-root">
	<!--begin::Login-->
	<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
		<!--begin::Aside-->
		
		<div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #181C32;">
			<!--begin::Aside Top-->
			<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
				<!--begin::Aside header-->
				<a href="#" class="text-center mb-10">
					<img src="{{asset('media/logos/Logo-WF_2.png')}}" class="max-h-100px" alt="" />
				</a>
				<!--end::Aside header-->
				<!--begin::Aside title-->
				<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #fff;">Bienvenue sur {{env('APP_NAME')}}</h3>
				<!--end::Aside title-->
			</div>
			<!--end::Aside Top-->
			<!--begin::Aside Bottom-->
			<!--end::Aside Bottom-->
		</div>
		<!--begin::Aside-->
		<!--begin::Content-->
		<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
			<!--begin::Content body-->
			<div class="d-flex flex-column-fluid flex-center">
				<!--begin::Signin-->
				<div class="login-form login-signin">
					<!--begin::Form-->
					
					<div class="mb-5">
						
						<!-- Alert success -->
					@include('globals.alerts.success')
					<!-- Alert success -->
						
						<!-- Amert danger valid -->
					@include('globals.alerts.danger-valid')
					<!-- Amert danger valid -->
					
					</div>
				
				
				@yield('content')
					<!--end::Form-->
				</div>
			</div>
			<!--end::Content body-->
		
		</div>
		<!--end::Content-->
	</div>
	<!--end::Login-->
</div>
<!--end::Main-->










{{--<script src="{{asset('js/plugins.bundle.js')}}"></script>--}}
<script src="{{asset('/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('/js/scripts.bundle.js')}}"></script>

@yield('scripts')


</body>
</html>
