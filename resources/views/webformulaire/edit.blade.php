
@extends('../welcome')
@section('title', env('APP_NAME').' - Webformulaires')

@section('page','Webformulaires')

@section('breadcrumbs')
    {{ Breadcrumbs::render('webformulaire_edit',[$dataBreadCrumbs,Cookie::get('side')]) }}
@endsection


@section('content')
    @if(Cookie::get('side')!='produit')
        @include('globals.tabs_comptclients')
    @endif

    <!-- Alert success -->
    @include('globals.alerts.success')
    @include('globals.alerts.danger-valid')


    <div class="rounded border">

        <div class="card  card-custom mt-10">
            <div class="card-header flex-wrap  pt-6 pb-6">

                <h3 class="fw-bolder m-0">
                    Mise à jour du formulaire : <span class="text-muted">{{$forms->title}}</span>
                </h3>

            </div>

            <div class="card-body">

                <form action="{{route('webformulaire.update',$forms->id)}}" method="POST" class="mt-10">
                    @csrf
                    <input type="hidden" value="{{$clients_id}}" name="clients_id" >

                        <x-text-field name="title"   :label="__('Formulaire nom')"
                                      :placeholder="__('forms.palceholder.plc_client')"
                                      type="text" :value="$forms->title" />

                        <x-select-field name="categories"
                                        :label="__('Catégories')"
                                        id="pays_select"
                                        :options="$cate"

                                        :value="$forms->categorie_id??old('categorie_id')" />

                        <x-textarea-field name="detail"
                                          :label="__('Détail')"
                                          rows="5">{{$forms->detail}}
                        </x-textarea-field>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12  ">
                                <a href="{{route("webformulaire.show",$clients_id)}}" type="reset" class="btn mr-2 btn-light float-right "  > {{__('forms.btn.btn_annuler')}}</a>
                                <button type="submit" class="float-right btn btn-light-primary mr-2"   >
                                    {{__('forms.btn.mettreajour')}}  </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
