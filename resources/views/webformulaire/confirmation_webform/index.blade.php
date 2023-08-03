@extends('welcome')
@section('title', env('APP_NAME').' - Confirmation')

@section('breadcrumbs')
    {{ Breadcrumbs::render('webformulaire_confirmation',[$form,Cookie::get('side')]) }}
@endsection

@section('active_Con','active')
@section('styles')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection

@section('page',"Webformulaires")


@section('content')


    @include('globals.tabs_elementsform')


        <!-- end .flash-message -->
        <!-- Alert success -->
        @include('globals.alerts.success')
        <!-- Alert success -->

        <!-- Amert danger valid -->
        @include('globals.alerts.danger-valid')
        <!-- Amert danger valid -->
        <!-- end .flash-message -->




        <div class="card card-custom mt-10">
            <div class="card-header flex-wrap  pt-6 pb-6">
                <div class="card-title">
                    <h3 class="card-label">
                        Liste des confirmations
                    </h3>
                </div>


                <a href="{{route('confirmation.create',$forms_id)}}" id="myBtn" class="btn btn-light-primary">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Créer une nouvelle confirmation
                </a>
                <!--end::Button-->
            </div>
            <div class="card-body">
        <!--begin: Search Form-->

        <!--begin: Datatable-->
        <table class="datatable datatable-bordered datatable-head-custom table-responsive  table-hover"  id="kt_datatable2" >
            <thead>
            <tr>
                {{--                    <th da><span style="width: 100px">&nbsp;</span></th>--}}
                <th class=" w-100"><span class="pl-5">nom</span></th>
                <th><span>type</span></th>
                <th><span>Contenu</span></th>
            </tr>
            </thead>
            <tbody>
                @foreach($Confirmation as $conf)

                    <tr>
                        <td>
                            <div class="pl-5">

                                {{$conf->name}} @if($conf->index_>0) ({{$conf->index_}}) @endif

                                <div class="row mt-3 action_cate w-50">
                                    <div class="col-lg-4 text-muted ">

                                        <a href="{{route('confirmation.edit',$conf->id)}}" class="text-hover-primary" title="Éditer" id="" >
                                            @include('layouts.icons.edit')
                                        </a>
                                    </div>
                                    |
                                    <div class="col-lg-3 text-muted"><a href="{{route('confirmation.duplicate',$conf->id)}}" title="cloner" class="text-primary">
                                            @include('layouts.icons.duplicate')
                                        </a></div>
                                </div>
                            </div>
                        </td>
                        <td>{{$conf->type}}</td>
                        <td>
                                {!!  Str::limit(html_entity_decode(strip_tags($conf->content)) , 10, $end='...')!!}
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
        </div>
@endsection
















        @section('scripts')

            <script src="{{ asset('/js/pages/crud/ktdatatable/base/data-ajax.js') }}" type="text/javascript"></script>



@endsection
