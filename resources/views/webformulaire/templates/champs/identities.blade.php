@if(isset($steps))
@php
	$f['nom'] = $formById[$steps]['nom'];
	$f['prenom'] = $formById[$steps]['prenom'];
	$f['civilite'] = $formById[$steps]['civilite'];
	$f['obligatior'] = $formById[$steps]['obligatior'];
@endphp
@endif

<div class=" row mx-095 w-100 field_{{$k}} @if(request()->is('admin/formulaires/apparence/*')) removepaddig @endif">

     @if(request()->is('admin/notification/*'))
          <h4 style="font-size: 24px;font-weight: bold">{{$f['name_group']}}</h4>
     @endif



    @if(isset($f['nom'])  && $f['nom'] !="0" )
        <div class="form-group  col-bs-sm-6 showElement  col-bs-12 child_{{$f['nom']}}" id="{{$f['nom']}}">
            <input type="text"
                   placeholder="@if(isset($conditions[$k]['nom'])&& isset($conditions[$k]['nom']->placeholder)) {{$conditions[$k]['nom']->placeholder}}@else {{__('fields.'.$f['nom'])}}@endif @if(isset($conditions[$k]['nom'])&&$conditions[$k]['nom']->required)* @endif"


                   @if(isset($conditions[$k]['nom']) && $conditions[$k]['nom']->required) required @endif
                   name="nom//Nom" data-title="{{ __('fields.'.$f['nom']) }}" data-value="__nom__" class="myInputs form-control">
        </div>
    @endif

    @if(isset($f['prenom'])  && $f['prenom'] !="0" )
        <div class="form-group  col-bs-sm-6 showElement  col-bs-12 child_{{$f['prenom']}}" id="{{$f['prenom']}}">
            <input type="text"
                   placeholder="@if(isset($conditions[$k]['prenom'])&& isset($conditions[$k]['prenom']->placeholder)) {{$conditions[$k]['prenom']->placeholder}}@else{{__('fields.'.$f['prenom'])}}@endif @if(isset($conditions[$k]['prenom'])&&$conditions[$k]['prenom']->required)* @endif"
                   @if(isset($conditions[$k]['prenom'])&&$conditions[$k]['prenom']->required) required @endif name='prenom//Prénom'
                   class="myInputs form-control" data-title="{{ __('fields.'.$f['prenom']) }}" data-value="__prenom__" />
        </div>
    @endif

    @if(isset($f['civilite'])  && $f['civilite'] !="0" )
        <div class="form-group  col-sm-12 col-bs-12  child_{{$f['civilite']}}" id="{{$f['civilite']}}">
            <select name="civilite//Civilité" id="civilite" data-title="{{ __('fields.'.$f['civilite']) }}" data-value="__civilite__"
                    @if(isset($conditions[$k]['civilite'])&&$conditions[$k]['civilite']->required) required @endif  class="myInputs form-control selectpicker" >
                <option value="" >
                    @if(isset($conditions[$k]['civilite'])&& isset($conditions[$k]['civilite']->placeholder)) {{$conditions[$k]['civilite']->placeholder}} @else {{__('fields.'.$f['civilite'])}}@endif
                    @if(isset($conditions[$k]['civilite'])&& isset($conditions[$k]['civilite']->required)) * @endif</option>
                <optgroup>
                    <option value="M" >M</option >
                    <option value="Mlle" >Mlle</option >
                    <option value="Mme" >Mme</option >
                </optgroup>
            </select >
        </div>
    @endif

</div>
