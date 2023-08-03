@extends('../welcome')
@section('title', env('APP_NAME').' - Webformulaires')

@section('breadcrumbs')

        {{ Breadcrumbs::render('webform.categorie') }}

@endsection

@section('active_Cat','active')

@section('page',"Webformulaires")


@section('content')
    @include('globals.alerts.success')
    @include('globals.alerts.danger-valid')
    <div class="rounded border">

        <div class="card  card-custom mt-10">
            <div class="card-header flex-wrap  pt-6 pb-6">
                <h3 class="card-label">
                    {{ __('Liste des catégories') }}
                </h3>
                <div class="float-right">
                    <a class="btn btn-light-primary btn-md btn-flat" id="myBtn"  href="#">
                        @include('layouts.icons.plus') {{ __('Créer une catégorie') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-xl-6">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="{{__('clients.search')}}" id="kt_datatable_search_query"/>
                                        <span>
										   <i class="flaticon2-search-1 text-muted"></i>
									   </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="datatable datatable-bordered datatable-head-custom table-responsive table-hover"
                       id="kt_datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Créer</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr class="action_cate_tr">
                            <td>
                                <div>
                                    {{ $category->id }}

                                </div>
                            </td>

                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                {{$category->created_at}}
                            </td>
                            <td>

                                <a class="" title="Éditer"
                                   data-id="{{$category->id}}" id="myBtn2"
                                   onclick="updatefunction('{{route('category.edit',$category->id)}}')">
                                    @include('layouts.icons.edit')
                                </a>
                                <a href="{{route('category.duplicate',$category->id)}}" title="cloner"
                                   class="text-primary mr-2">
                                    @include('layouts.icons.duplicate')
                                </a>
                                <a href="#" class="text-danger btnDeletCate mr-2" title="Supprimer" id="btnDeletCate"
                                   onclick="DeletConfig('{{route('category.destroy',$category->id)}}')">
                                    @include('layouts.icons.delete')
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    @include('webformulaire.categories.form')
    @include('webformulaire.categories.form_update')
@endsection

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


@section('scripts')

    <script type="text/javascript">
        var modal2 = document.getElementById("Formupdate");
        var span_2 = document.getElementsByClassName("close")[1];


        function updatefunction(e) {
            modal2.style.display = "flex";

            $.ajax({
                method: "GET",
                url: e,
                success: function (data) {
                    $('#formrenamcate').attr('action', `/admin/categories/editer/` + data[0]["id"])
                    $('input[name="name_webformulaire"]').attr('value', data[0]["name"])
                    $('.namecateUpd').html(data[0]['name'])
                }
            })
        }

        span_2.onclick = function () {
            modal2.style.display = "none";
        }

    </script>

    <script src="{{ asset('/js/pages/crud/ktdatatable/base/data-ajax.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/pages/my-script.js') }}" type="text/javascript"></script>
@endsection
