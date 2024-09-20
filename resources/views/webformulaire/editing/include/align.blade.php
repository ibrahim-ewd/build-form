
<div class="col-12 form-group mb-3">
    <label for="itemAlign">Stars position</label>

    <div class="switch-field">
        <input type="radio" class="input-edit-form" id="radio-three"
               name="{{$name}}"
               value="start"
               @if(isset($item->position) && $item->position == "start") checked @endif/>
        <label for="radio-three">
            <i class="fa fa-align-left"></i>
        </label>

        <input type="radio" class="input-edit-form" id="radio-four"
               name="{{$name}}"
               value="center"
               @if(isset($item->position) && $item->position == "center") checked @endif/>
        <label for="radio-four">
            <i class="fa fa-align-center"></i>
        </label>


        <input type="radio" class="input-edit-form" id="radio-five"
               name="{{$name}}"
               value="end"
               @if(isset($item->position) && $item->position == "end") checked @endif/>
        <label for="radio-five">
            <i class="fa fa-align-right"></i>
        </label>
    </div>
</div>
