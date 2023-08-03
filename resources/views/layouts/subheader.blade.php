{{--<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">--}}
{{--    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">--}}
{{--        --}}
{{--        <div class="container-fluid ">--}}
{{--            <div class="d-flex align-items-baseline flex-wrap">--}}
{{--                @yield('breadcrumbs')--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="d-flex w-md-100 align-items-center flex-wrap mr-1">--}}
{{--            <div class="d-flex align-items-baseline flex-wrap mr-5">--}}
{{--                <h6 class="opacity-75">@yield('rightSubheader')</h6>--}}
{{--                    @yield('contentSubheader')--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}
{{--</div>--}}



<div class="subheader py-2 px-8 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid container-fluid-wf d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Page Heading-->
			
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				@yield('breadcrumbs')
			</div>
			<!--end::Page Heading-->
		</div>
		<!--end::Info-->
		
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			
			 <span class="returnBtn  btn btn-sm btn-flex bg-light-primary text-primary font-weight-bold mr-5">
                      <span class="svg-icon svg-icon-3 svg-icon-primary">
	                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mh-50px">
		                      <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"></path>
		                      <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"></path>
	                      </svg>
                      </span>
				 Retour
                </span>
			
			@yield('contentSubheader')
		</div>
		<!--end::Toolbar-->
	</div>
</div>