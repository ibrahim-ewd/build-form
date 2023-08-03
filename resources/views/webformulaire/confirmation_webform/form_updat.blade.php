@extends('welcome')


@section('breadcrumbs', Breadcrumbs::render('webformulaire_confirmation',[$form, Cookie::get('side')]) )


@section('page','Webformulaires')


@section('content')


    @include('globals.tabs_elementsform')

                    <!-- Alert success -->
                @include('globals.alerts.success')
                <!-- Alert success -->

                    <!-- Amert danger valid -->
                @include('globals.alerts.danger-valid')
                <!-- Amert danger valid -->

    <div class="rounded border">

        <div class="card  card-custom mt-10">
            <div class="card-header flex-wrap  pt-6 pb-6">
                <h3 class="card-label">
                    {{ __('Modification de la confirmation') }}
                </h3>
            </div>

            <div class="card-body card-body-wf" >
                <form action="{{route('confirmation.update',$id)}}" method="POST" class="mt-10">
                    @csrf

                        <div class="row mb-6">
                            <label  class="col-sm-3 form-label">Confirmation nom : </label>
                            <div class="col-sm-9">
                                <input type="text" id="reference_cree" value="{{isset($Confirmation['name'])?$Confirmation['name']:''}}" name="name"
                                       class="form-control w-75 " placeholder="{{__('forms.palceholder.plc_client')}}"/>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label  class="col-sm-3 col-12 col-form-label">Confirmation type : </label>
                            <div class="col-sm-9">
                                <div class="checkbox-inline mt-3 row">
                                    <label class="radio col-sm-2 mb-5 radio-success">
                                        <input type="radio" value="Text"  class="btn_Checked_type" name="type"
                                               @if(isset($Confirmation['type']) == "Text") checked="true" @endif
                                        />
                                        <span></span>
                                        &nbsp;
                                        Text
                                    </label>

                                    <label class="radio  col-sm-2 mb-5 radio-success">
                                        <input type="radio" value="Page" name="type" class="btn_Checked_type"
                                               @if(!isset($Confirmation['type'])|| $Confirmation['type']=="Page") checked="true" @endif/>
                                        <span></span>
                                        &nbsp;
                                        Page
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">

                            <label  class="col-sm-3 form-label">Message : </label>


                            <div class="col-sm-9 ">

                                <div class=" myfieldMessag"
                                     @if(!isset($Confirmation['type']) ||$Confirmation['type']=="Page")style="display: block" @else style="display: none" @endif
                                >
                                    <textarea name="@if(isset($Confirmation['type']) && $Confirmation['type']=="Page") message @else mes @endif"  class="my-editor wisiwig-content form-control" id="my-editor" cols="30" rows="10">
                                        {!! isset($Confirmation['content'])?$Confirmation['content']:''!!}
                                    </textarea>
                                </div>


                                <div class="myfieldMessagInput  "
                                     @if(isset($Confirmation['type']) && $Confirmation['type']=="Text") style="display: block" @else style="display: none" @endif
                                >
                                    <input type="text" name="@if(isset($Confirmation['type']) && $Confirmation['type']=="Text") message @else mes @endif"  class="form-control w-75" value="{{isset($Confirmation['content'])? $Confirmation['content'] :''}} ">
                                </div>
                            </div>

                        </div>

                    <div class="card-footer">
                        <div class="row">

                            <div class="col-12  ">
                                <button type="reset" class="btn mr-2  float-right btn-light " style="text-transform: capitalize" > {{__('forms.btn.btn_annuler')}}</button>
                                <button type="submit" class="float-right btn btn-light-primary mr-2"  style="text-transform: capitalize" >
                                    {{__('forms.btn.btn_enregistrer')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script >
        $('.btn_Checked_type').click(function(){

            if($(this).val()=='Page'){
                $('.myfieldMessag').css('display','block')
                $('.myfieldMessagInput').css('display','none')

                $('.myfieldMessag').find('input').attr('name','message')
                $('.myfieldMessagInput').find('input').attr('name','')
            }else{
                $('.myfieldMessag').css('display','none')
                $('.myfieldMessagInput').css('display','block')
                $('.myfieldMessagInput').find('input').attr('name','message')
                $('.myfieldMessag').find('input').attr('name','')
            }
        })
    </script >
    @stack('scripts')
@endsection
