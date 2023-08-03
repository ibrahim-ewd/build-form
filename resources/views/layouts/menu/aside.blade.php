
        <!--begin::Aside-->
        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" data-kt-drawer="true"
             data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
             data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
             data-kt-drawer-toggle="#kt_aside_mobile_toggle" style=""
        >
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_aside_logo">
                <!--begin::Logo-->
                <div class="brand-logo">
                    <a href="/admin">
                        <img alt="Logo" src="{{asset('media/logos/logo_wf_1.png')}}" class="h-25px logo" />
                    </a>
                </div>

                <!--end::Logo-->
                <!--begin::Aside toggler-->
                <div id="kt_aside_toggle" class="brand-toggle  btn btn-sm ml-6 px-0" data-kt-toggle="true"
                     data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                    <span class="svg-icon svg-icon-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path
                                    d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                    fill="#000000" fill-rule="nonzero"
                                    transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) ">
                                </path>
                                <path
                                    d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                    transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) ">
                                </path>
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside toggler-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside menu-->
            <div class="aside-menu-wrapper flex-column-fluid Asidemenu"  id="kt_aside_menu_wrapper">
                <!--begin::Aside Menu-->
                <div class="aside-menu my-4 scroll ps ps--active-y" id="kt_aside_menu" data-kt-scroll="true"
                     data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                     data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
                     data-kt-scroll-offset="0" style="height: 100% !important;margin: 0 !important;padding: 0;">
                    <!--begin::Menu-->
                    <ul class="menu-nav">
                        <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin']) }}" aria-haspopup="true">
                            <a href="/admin" class="menu-link ">
                                <span class="svg-icon menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path
                                                d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-text">{{__('layout.menuleft.Tableau_de_board')}}</span>
                            </a>
                        </li>

                        <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/client','admin/client/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('Clients')}}" class="menu-link ">
                             <span class="svg-icon menu-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <polygon points="0 0 24 0 24 24 0 24"/>
                                          <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                          <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                      </g>
                                  </svg>
                               </span>
                                <span class="menu-text">{{__('layout.menuleft.clients')}}</span></a>
                        </li>

                        @php
                            $active_menu = ['admin/client/Calltraking', 'admin/client/Calltraking/*', 'admin/calltraking/*',
                            'admin/client/Webformulaires', 'admin/client/Webformulaires/*','admin/formulaires/*',
                            'admin/categories', 'admin/categories/*',
                            'admin/client/Mailing', 'admin/client/Mailing/*','admin/*/mailing/*',
                             'admin/client/Ereputaion', 'admin/client/Ereputaion/*',
                             'admin/client/Statistiques', 'admin/client/Statistiques/*',
                             'admin/statistiques', 'admin/statistiques/*',
                             ]

                        @endphp

                        <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->activeMenu($active_menu) }}" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="#" class="menu-link menu-toggle"><span class="svg-icon menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/>
                                        <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                    <!--end::Svg Icon-->
                                </span><span class="menu-text">{{__('layout.menuleft.products')}}</span>
                                <i class="menu-arrow"></i>
                            </a>


                            <div class="menu-submenu ">
                                <span class="menu-arrow"></span>
                                <ul class="menu-subnav">
                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                        <span class="menu-link"><span class="menu-text">Pages</span></span>
                                    </li>

                                    <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/calltraking','admin/calltraking/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{route('client.list.client','Calltraking')}}?side=produit&tab=Calltraking" class="menu-link menu-toggle"><i
                                                class="menu-bullet "><span></span></i><span
                                                class="menu-text">{{__('app.Calltraking')}}</span></a>
                                    </li>


                                    @php
                                        $active_menu = [
                                        'admin/client/Webformulaires', 'admin/client/Webformulaires/*','admin/formulaires/*',
                                        'admin/categories', 'admin/categories/*',]

                                    @endphp


                                    <li class="menu-item menu-item-submenu
                                           {{ (new App\Helpers\Tools)->activeMenu($active_menu) }}
                                        "  data-menu-toggle="hover">
                                        <a href="/admin/formulaires" class="menu-link menu-toggle"><i
                                                class="menu-bullet "><span></span></i><span
                                                class="menu-text">{{__('app.Webformulaires')}}</span>
                                            <i class="menu-arrow"></i>
                                        </a>


                                        <div class="menu-submenu">

                                            <span class="menu-arrow"></span>
                                            <ul class="menu-subnav">
                                                <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin/formulaires','admin/formulaires/*']) }}" aria-haspopup="true">
                                                    <a href="{{route('client.list.client','Webformulaires')}}?tab=Webformulaires&side=produit" class="menu-link"><i
                                                            class="menu-bullet "><span></span></i><span
                                                            class="menu-text">{{__('app.Formulaire')}}</span></a>
                                                </li>

                                                <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin/categories','admin/categories/*']) }}" aria-haspopup="true">
                                                    <a  href="{{route('category.index')}}?side=produit" class="menu-link"><i
                                                            class="menu-bullet "><span></span></i><span
                                                            class="menu-text">{{__('app.Categories')}}</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>



                                    @php
                                        $active_menu = [ 'admin/client/Mailing', 'admin/client/Mailing/*','admin/*/mailing/*',]

                                    @endphp

                                    <li class="menu-item menu-item-submenu
                                       {{ (new App\Helpers\Tools)->activeMenu($active_menu) }}
                                            " aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{route('client.list.client','Mailing')}}?tab=Mailing&side=produit" class="menu-link menu-toggle">
                                            <i class="menu-bullet ">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">{{ __('app.Mailing') }}</span>
                                            <span class="menu-badge">
                                            </span>
                                            <i class="menu-arrow"></i>
                                        </a>

                                        <div class="menu-submenu" >
                                            <span class="menu-arrow"></span>
                                            <ul class="menu-subnav">

                                                <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin/*/mailing/campagnes','admin/*/mailing/campagnes/*']) }}" aria-haspopup="true">
                                                    <a href="{{route('client.list.client','Mailing')}}?tab=Campagnes&side=produit"
                                                       class="menu-link"><i
                                                             class="menu-bullet "><span></span></i><span
                                                             class="menu-text">{{ __('app.Campagnes') }}</span></a>
                                                </li>

                                                <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin/*/mailing/templates','admin/*/mailing/templates/*']) }}" aria-haspopup="true">
                                                    <a href="{{route('client.list.client','Mailing')}}?tab=Templates&side=produit"
                                                       class="menu-link"><i
                                                            class="menu-bullet "><span></span></i><span
                                                            class="menu-text">{{ __('app.Templates') }}</span></a>
                                                </li>

                                                <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin/*/mailing/subscribers','admin/*/mailing/subscribers/*']) }}" aria-haspopup="true">
                                                    <a href="{{route('client.list.client','Mailing')}}?tab=Subscribers&side=produit"
                                                       class="menu-link"><i
                                                             class="menu-bullet "><span></span></i><span
                                                             class="menu-text">{{ __('app.Subscribers') }}</span></a>
                                                </li>

                                                <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin/*/mailing/liste-contacts','admin/*/mailing/liste-contacts/*']) }}" aria-haspopup="true">
                                                    <a href="{{route('client.list.client','Mailing')}}?tab=liste-contacts&side=produit"
                                                       class="menu-link"><i
                                                             class="menu-bullet "><span></span></i><span
                                                             class="menu-text">{{ __('app.Liste de contacts') }}</span></a>
                                                </li>



                                                <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin/*/mailing/email-services','admin/*/mailing/email-services/*']) }}" aria-haspopup="true">
                                                    <a href="{{route('client.list.client','Mailing')}}?tab=Email_services&side=produit"
                                                       class="menu-link"><i
                                                             class="menu-bullet "><span></span></i><span
                                                             class="menu-text">{{ __('app.Email services') }}</span></a>
                                                </li>

{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a  href="{{route('category.index')}}" class="menu-link"><i--}}
{{--                                                             class="menu-bullet "><span></span></i><span--}}
{{--                                                             class="menu-text">Catégories</span></a>--}}
{{--                                                </li>--}}

                                            </ul>
                                        </div>


                                    </li>

                                    <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/client/Ereputaion','admin/client/Ereputaion/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{route('client.list.client','Ereputaion')}}?tab=Ereputaion&side=produit"  class="menu-link menu-toggle"><i
                                                class="menu-bullet "><span></span></i><span
                                                class="menu-text">{{__('app.Ereputaion')}}</span></a>
                                    </li>


                                    <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/statistiques','admin/statistiques/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{route('client.list.client','Statistiques')}}?tab=Statistiques&side=produit"  class="menu-link menu-toggle"><i
                                                class="menu-bullet "><span></span></i><span
                                                class="menu-text">{{__('app.Statistiques')}}</span></a>
                                    </li>

                                </ul>
                            </div>
                        </li>

{{--                        <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">--}}
{{--                            <a href="#" class="menu-link menu-toggle"><span class="svg-icon menu-icon">--}}

                        @php
                            $active_menu = [
                                'admin/administrateur', 'admin/administrateur/*',
                                'admin/gestion-demandes', 'admin/gestion-demandes/*',
                                'admin/produits-description', 'admin/produits-description/*',
                                'admin/modeles-defaut', 'admin/modeles-defaut/*',
                                'admin/email-services', 'admin/email-services/*',
                        ]

                        @endphp


                        <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->activeMenu($active_menu) }}" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('client.admin.index')}}" class="menu-link  menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:media/svg/icons/Layout/Layout-4-blocks.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span><span class="menu-text">{{__('layout.menuleft.admin')}} </span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <span class="menu-arrow"></span>
                                <ul class="menu-subnav">

                                    <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/administrateur','admin/administrateur/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{route('client.admin.index')}}" class="menu-link menu-toggle"><i
                                                 class="menu-bullet "><span></span></i><span
                                                 class="menu-text">Gestion compte</span></a>
                                    </li>

                                    <li class="menu-item menu-item-submenu  {{ (new App\Helpers\Tools)->openMenu(['admin/gestion-demandes','admin/gestion-demandes/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{route('gestion.demandes.index')}}" class="menu-link menu-toggle"><i
                                                 class="menu-bullet "><span></span></i><span
                                                 class="menu-text">Gestion demandes</span></a>
                                    </li>

                                    <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/produits-description','admin/produits-description/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{route('produits.description.index')}}"  class="menu-link menu-toggle"><i
                                                 class="menu-bullet "><span></span></i><span
                                                 class="menu-text">Descriptions des produits </span></a>
                                    </li>

                                    <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/modeles-defaut','admin/modeles-defaut/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{route('sendportal.default_templates.index')}}"  class="menu-link menu-toggle"><i
                                                 class="menu-bullet "><span></span></i><span
                                                 class="menu-text">Modèles par défaut </span></a>
                                    </li>

                                    <li class="menu-item {{ (new App\Helpers\Tools)->openMenu(['admin/email-services','admin/email-services/*']) }}" aria-haspopup="true">
                                        <a href="{{route('service.smtp.edit')}}"
                                           class="menu-link"><i
                                                 class="menu-bullet "><span></span></i><span
                                                 class="menu-text">{{ __('Email services') }}</span></a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/systemlogs','admin/systemlogs/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('systemlogs.index')}}"  class="Jaa-class menu-link ">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:media/svg/icons/Layout/Layout-4-blocks.svg-->
                                      <svg xmlns="http://www.w3.org/2000/svg"
                                           fill="currentColor" class="bi bi-person-fill" width="24px" height="24px"
                                           viewBox="0 0 24 24" version="1.1">
                                            <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" />
                                            <rect opacity="0.5" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                    </svg>

                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">{{__('layout.menuleft.Logs')}}</span></a>
                        </li>

                        <li class="menu-item menu-item-submenu {{ (new App\Helpers\Tools)->openMenu(['admin/historique-de-connexion','admin/historique-de-connexion/*']) }}" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{route('login.history.index')}}"  class="Jaa-class menu-link ">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:media/svg/icons/Layout/Layout-4-blocks.svg-->
                                      <svg xmlns="http://www.w3.org/2000/svg"
                                           fill="currentColor" class="bi bi-person-fill" width="24px" height="24px"
                                           viewBox="0 0 24 24" version="1.1">
                                            <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" />
                                            <rect opacity="0.5" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                    </svg>

                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">{{__('layout.menuleft.LoginHistory')}}</span></a>
                        </li>

                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside menu-->
        </div>
<!--End::Aside-->
