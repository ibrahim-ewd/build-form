<fieldset class="col-12 my-10 scheduler-border p-2">
     <legend class="scheduler-border">Réglages</legend>

     <div class="row">


         <div class="form-group col-lg-12 col-12 mt-10">
             <label for="">Placeholder : </label>
             <input type="text" class="form-control print_placeholder"   data-parent="{{$key}}"  data-name="{{$ele['elements'][0]}}"   name="placeholder" />
         </div>


          <label class="checkbox checkbox-outline col-12  checkbox-success checkbox-lg ">
               <input type="checkbox" class="check_obli check_champ_obligatiore" value="required"
                      data-parent="{{$key}}"   data-name="{{$ele['elements'][0]}}" >
               <span></span>
               &nbsp;
               Obligatoire
          </label>
     </div>
{{--</fieldset>--}}

{{--<fieldset class="col-12 my-10 scheduler-border p-2">--}}
{{--     <legend class="scheduler-border">Types de téléphone</legend>--}}
     <div id="formedit" class="row">

          @foreach($ele['type_elements'] as $ke=>$el)

               <div class="col-lg-6 col-12 ">
                    <label class="radio radio-outline radio-success radio-lg  mt-10 ">
                         <input type="radio" value="{{$el}}"
                                data-parent="telephone"
                                @if(isset($form['fields'][0]['type_elements']) && $form['fields'][0]['type_elements'] == $el || $ke==0) checked @endif
                                class="check_{{$key}}"
                                name="{{$ele['elements'][0]}}" />
                         <span></span>

                         &nbsp; {{Str::replace('_', ' ', ucfirst($el))}}

                    </label>
               </div>
          @endforeach
     </div>

</fieldset>




<fieldset class="col-12 my-10 scheduler-border p-2">
     <legend class="scheduler-border">{{__('fields.styles_fields')}}</legend>
     <div>

          <input type="hidden" value name="dfg" id="number_{{$ele['elements'][0]}}_indrop">

          <div id="" class="row  ">
               <div class="col-12">
                    @include("webformulaire.building.fields.grids")
               </div>
          </div>
     </div>




    <div class="row">
        <label class="checkbox checkbox-outline  checkbox-success checkbox-lg col-12">
            <input type="checkbox" class="btn_visible_title"  data-name="{{$key}}" />
            <span></span>
            &nbsp; Title visible
        </label>
    </div>
</fieldset>
