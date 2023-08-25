{{--{{dd($data->champ)}}--}}
{{--    <div class="form-group">--}}
{{--        <label for="exampleInputEmail1">Label</label>--}}
{{--        <input type="text" class="form-control" id="exampleInputEmail1">--}}
{{--    </div>--}}

{{--    <div class="form-group">--}}
{{--        <label for="exampleInputPassword1">placeholder</label>--}}
{{--        <input type="text" class="form-control" id="exampleInputPassword1">--}}
{{--    </div>--}}

<div class="accordion" id="accordionExample">

    <div class="accordion-item">

        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                First name
            </button>
        </h2>

        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
             data-bs-parent="#accordionExample">
            <div class="accordion-body">

                <div class="form-group my-3">
                    <label for="label">label</label>
                    <input type="text" name="champ.firstname.label" data-index="{{$index}}" value="{{$data->champ->firstname->label}}" class="input-edit-form form-control"
                           id="label">
                </div>

                <div class="form-group my-3">
                    <label for="label">placeholder</label>
                    <input type="text" name="[0]['champ']['firstname']['placeholder']" value="{{$data->champ->firstname->placeholder}}"
                           class="input-edit-form form-control" id="placeholder">
                </div>

                <div class="form-group my-3">
                    <label for="label">notice</label>
                    <input type="text" name="[0]['champ']['firstname']['notice']" value="{{$data->champ->firstname->notice}}" class="input-edit-form form-control"
                           id="notice">
                </div>

            </div>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>

</div>



