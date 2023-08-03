
@extends('welcome')
@section('title', env('APP_NAME').' - Confirmation Webformulaires')
@section('page','Webformulaires')
@section('breadcrumbs', Breadcrumbs::render('webformulaire_edite',$form) )


@section('content')





    @include('globals.tabs_elementsform')



                    <!-- Alert success -->
                @include('globals.alerts.success')
                <!-- Alert success -->

                    <!-- Amert danger valid -->
                @include('globals.alerts.danger-valid')
                <!-- Amert danger valid -->


                    <div class="card card-custom mt-10">

                        <div class="card-header">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">Modification de la confirmation</h3>
                            </div>
                        </div>

                        <form action="{{route('confirmation.update',$id)}}" method="POST" class="mt-10">
                            @csrf
                            <div class="card-body">

                                <div class="row mb-6">
                                    <label  class="col-2 col-form-label">Confirmation nom : </label>
                                    <div class="col-8">
                                        <input type="text" id="reference_cree" name="name"
                                               class="form-control w-75 " value="@if(isset($Confirmation)){{$Confirmation['name']?:''}} @endif" placeholder="{{__('forms.palceholder.plc_client')}}"/>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label  class="col-2 col-form-label">Confirmation type : </label>
                                    <div class="col-8">
                                        <div class="checkbox-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" value="Text" class="btn_Checked_type"
                                                       @if(isset($Confirmation)){{$Confirmation['type']=='Text'?'checked':''}} @endif
                                                       name="type"/>
                                                <span></span>
                                                &nbsp;
                                                Text
                                            </label>

                                            <label class="radio radio-success ml-20">
                                                <input type="radio" value="Page" class="btn_Checked_type"
                                                       @if(isset($Confirmation)){{$Confirmation['type']=='Page'?'checked':''}} @endif
                                                       name="type"/>
                                                <span></span>
                                                &nbsp;
                                                Page
                                            </label>

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label  class="col-2 col-form-label">Message : </label>


                                    <div class="col-8">
                                            <div class="myfieldMessag"
{{--                                                 style="display: @if(isset($Confirmation)){{$Confirmation['type']=='Text'?'none':'block'}} @endif"--}}
                                            >
                                                <textarea name="message"
                                                          class="my-editor wisiwig-content form-control"
                                                          id="my-editor" cols="30" rows="10">  @if(isset($Confirmation)){!!  $Confirmation['content']?:'' !!} @endif</textarea>
                                            </div>

{{--                                            <div class="myfieldMessagInput w-75"--}}
{{--                                           style="display: @if(isset($Confirmation)){{$Confirmation['type']=='Page'?'none':'block'}} @endif"--}}
{{--                                            >--}}
{{--                                                <input type="text" name="message2"  class="form-control" value="@if(isset($Confirmation)){{$Confirmation['content']?:''}} @endif">--}}
{{--                                            </div>--}}

                                    </div>
                                </div>



                            </div>
                            <div class="card-footer">
                                <div class="row">

                                    <div class="col-12  ">
                                        <button type="reset" class="btn mr-2  float-right btn-light" style="text-transform: capitalize" > {{__('forms.btn.btn_annuler')}}</button>
                                        <button type="submit" class="float-right btn btn-light-primary mr-2"  style="text-transform: capitalize" >
                                            {{__('forms.btn.btn_enregistrer')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

@endsection
@section('scripts')
    @stack('scripts')
@endsection
