<div class="form-group my-3">
    <label for="label">Notice</label>
    <input type="text"
           name="notice"
           value="{{$champ->notice}}"
           class="input-edit-form form-control form-control-sm"
           id="notice">


    {{--                        <div class="btn-group btn-group-toggle mt-2" data-toggle="buttons">--}}
    {{--                            <label--}}
    {{--                                class="btn btn-outline-secondary btn-sm {{Str::contains($champ->notic_style??'','text-align:left')?'active':''}}">--}}
    {{--                                <input type="radio" name="notic_style" class="input-edit-form d-none"--}}
    {{--                                       value="text-align:left"--}}
    {{--                                       id="notic_style{{$key}}">--}}
    {{--                                left--}}
    {{--                            </label>--}}
    {{--                            <label--}}
    {{--                                class="btn btn-outline-secondary btn-sm {{Str::contains($champ->notic_style??'','text-align:center')?'active':''}}">--}}
    {{--                                <input type="radio" name="notic_style" class="input-edit-form d-none"--}}
    {{--                                       value="text-align:center"--}}
    {{--                                       id="notic_style{{$key}}"> center--}}
    {{--                            </label>--}}
    {{--                            <label--}}
    {{--                                class="btn btn-outline-secondary btn-sm {{Str::contains($champ->notic_style??'','text-align:right')?'active':''}}">--}}
    {{--                                <input type="radio" name="notic_style" class="input-edit-form d-none"--}}
    {{--                                       value="text-align:right"--}}
    {{--                                       id="notic_style{{$key}}"> right--}}
    {{--                            </label>--}}
    {{--                        </div>--}}
</div>
