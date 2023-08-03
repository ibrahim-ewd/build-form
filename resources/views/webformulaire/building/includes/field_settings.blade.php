

<div class="field_message_error justify-content-center align-items-center text-center d-flex h-400px text-danger"  >
    <h3> vous devez d'abord choisissez un champ</h3>
</div>

<div style="display: none" class="feilds_formsEdit">

    <div class="form-group  mt-10">
        <h5 class="my-4 head-group" >
            <span class="name_group_edit ">Edit</span>
            <label class="d-none"> &nbsp;&nbsp;ID: <input readonly style="pointer-events:none;border:0px " id="id_chump"  value="0"/>
                <input type="hidden"  readonly style="pointer-events:none;border:0px " id="id_campheure"  value="0"/>
            </label>
        </h5>
    </div>

    <div class="form-group  mt-10">
        <label>Nom de champ</label>
        <input type="text" class="form-control form-control-sm"  name="name_group" id="name_group"  value="" />
    </div>

{{--    @foreach($element as $key=>$ele)--}}

{{--        <div style="display: none"  id="edit_{{$key}}" class="flields_edit">--}}
{{--            <input type="hidden"  style="pointer-events:none " value="0" id="position_{{$key}}" />--}}
{{--            @if($ele['edit']==true)--}}
{{--                <h5>Champs spécifiques </h5>--}}

{{--                @if($ele['elements'][0]=="email")--}}
{{--                    @include('webformulaire.building.fields.email')--}}

{{--                @elseif($ele['elements'][0]=="site_web")--}}
{{--                    @include('webformulaire.building.fields.site_web')--}}

{{--                @elseif($ele['elements'][0]=="societe")--}}
{{--                    @include('webformulaire.building.fields.societe')--}}

{{--                @elseif($ele['elements'][0]=="message")--}}
{{--                    @include('webformulaire.building.fields.message')--}}

{{--                @elseif($ele['elements'][0]=="reponsecourte")--}}
{{--                    @include('webformulaire.building.fields.text')--}}

{{--                @elseif($ele['elements'][0]=="telephone")--}}
{{--                    @include('webformulaire.building.fields.telephone')--}}

{{--                @elseif($ele['elements'][0]=="date" || $ele['elements'][0]=="heure")--}}
{{--                    @include('webformulaire.building.fields.date')--}}

{{--                @elseif($ele['elements'][0]=="caseacocher" || $ele['elements'][0]=="multiple" || $ele['elements'][0]=="menuderoulant")--}}
{{--                    @include('webformulaire.building.fields.multiple')--}}

{{--                @elseif($ele['elements'][0]=="media")--}}
{{--                    @include('webformulaire.building.fields.media')--}}

{{--                @elseif($ele['elements'][0]=="satisfaction")--}}
{{--                    @include('webformulaire.building.fields.satisfaction')--}}

{{--                @elseif($ele['elements'][0]=="privacy")--}}
{{--                    @include('webformulaire.building.fields.privacy')--}}

{{--                @elseif($ele['elements'][0]=="importfichier")--}}
{{--                    @include('webformulaire.building.fields.importfichier')--}}

{{--                @elseif($key=="identities")--}}
{{--                    @include('webformulaire.building.fields.identities')--}}

{{--                @elseif($key=="address")--}}
{{--                    @include('webformulaire.building.fields.address')--}}

{{--                @elseif($key == "address")--}}
{{--                    @include('webformulaire.building.fields.address')--}}

{{--                @elseif($key == "paragraphe")--}}
{{--                    @include('webformulaire.building.fields.paragraph')--}}

{{--                @elseif($key == "button")--}}
{{--                    @include('webformulaire.building.fields.button')--}}

{{--                @else--}}
{{--                    @if($ele['type']=="Champ_preconfigures")--}}
{{--                        @include('webformulaire.building.fields.champ_preconfigures')--}}

{{--                    @elseif($ele['type']=="Champs_Standards")--}}
{{--                        @include('webformulaire.building.fields.champs_Standards')--}}
{{--                    @endif--}}
{{--                @endif --}}{{--   endif edit true--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    @endforeach--}}

</div>
