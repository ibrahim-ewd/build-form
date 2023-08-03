<div id="kt_header" class="header  header-fixed ">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
        </div>



        <div class="topbar mr-5">
            <div class="topbar-item mr-5">
                <a href="{{ route('gestion.demandes.index') }}" type="button" class="btn btn-light-primary btn-md btn-flat">
                    <span class="navi-icon">
					<i class="far fa-bell"></i>
				</span>
                    Nouvelles demandes
                    @if($new_demands_clients > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                            {{ $new_demands_clients }}
                        </span>
                    @endif
                </a>

            </div>
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-light d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">
                        Bonjour ,
                    </span>
                    
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                        {{Auth::guard('web')->user()->name}}
                    </span>
                    
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
					<span class="symbol-label font-size-h5 font-weight-bold text-capitalize">{{substr(Auth::guard('web')->user()->name,0,1)}}</span>
				</span>
                </div>
            </div>
        </div>
    </div>
</div>





<div id="kt_quick_user" class="offcanvas offcanvas-right p-10 offcanvas-off">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" kt-hidden-height="40" style="">
        <h3 class="font-weight-bold m-0">Profil de l'administrateur</h3>
        <a href="#" class="btn   btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5 scroll ps ps--active-y" style="height: 354px; overflow: hidden;">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <span class="symbol-label font-size-h1 font-weight-bold text-capitalize">{{substr(Auth::guard('web')->user()->name,0,1)}}</span>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <span class="font-weight-bold font-size-h5 text-dark-75  text-capitalize">{{Auth::guard('web')->user()->name}}</span>
                <div class="navi mt-2">
                    <span class="navi-item">
				    <span class="navi-link p-0 pb-2">
				    	<span class="navi-text text-muted ">{{Auth::guard('web')->user()->email}}</span>
				    </span>
                    </span>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>


        <a href="{{route('logout')}}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Se déconnecter</a>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
            </div></div><div class="ps__rail-y" style="top: 0px; height: 354px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 140px;">
            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
