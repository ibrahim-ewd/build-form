<div class="row-edit-option">
    <span>Titles</span>
    <span>Values</span>
    <span><div class="btn btn-primary btn-options-plus"><i
                class="cursor-pointer fa fa-plus"></i></div></span>
</div>
<div class="section-of-option">
    @foreach($champ->options as $keyOption=>$value)

        <div class="drageable-element-option">
            <div class="row-edit-option" data-index-option="{{$keyOption}}">
        <span data-name="title">
            {{--                                              //  <span class="btn-edit-title-option cursor-pointer">{{$value[1]}}</span>--}}
            <input type="text" name="title" value="{{$value->title}}"
                   class="input-edit-option form-control ">
        </span>

                <span data-name="value">

            <input type="text" name="value" required value="{{$value->value}}"
                   class="input-edit-option form-control ">
        </span>

                <span >
                            <div class="d-flex">
                <div class="mx-2 btnDeleteOption cursor-pointer">
                    <i class="fa fa-trash mt-2"></i>
                </div>
                <div class="mx-2 btnUploadImage cursor-pointer">

                    @if(isset($value->img) &&  !empty($value->img) && $value->img->src!=null)
                        <img class="image_icon_options" src="{{url("storage/".$value->img->src)}}"
                             alt="{{$value->img->name??""}}">
                    @else
                        <i class="fa fa-image mt-2"></i>
                    @endif
                </div>
                                <div class="fas fa-sort handle ui-sortable-handle mx-2 mt-2 "></div>
            </div>

        </span>
            </div>

            <div class="row-change-image row-change-image_{{$keyOption}} d-none" data-index-option="{{$keyOption}}">
                <div class="d-flex">

                    {{--         //   <input type="file" name="image-option">--}}

                    <div class="picture-container">
                        <div class="picture">

                            <img @if(isset($value->img) && !empty($value->img))

                                 src="{{url("storage/".$value->img->src)}}"
                                 title="{{$value->img->name}}"
                                 @else
                                 src="#"
                                 @endif
                                 class="picture-src" id="wizardPicturePreview" title="">

                            <input type="file" id="wizard-picture-{{$keyOption}}" class="upload-image-option">
                        </div>
                    </div>

                    <span class="d-flex flex-column" style="width: 100px">

                <label for="wizard-picture-{{$keyOption}}"
                       class=" btn btn-primary d-flex justify-content-center mx-2 btnChangeImageOption cursor-pointer">
                    <i class="fa fa-edit"></i>
                </label>

                <div class="btn btn-danger d-flex justify-content-center mx-2 btnDeleteImageOption cursor-pointer">
                    <i class="fa fa-trash "></i>
                </div>
            </span>

                </div>
            </div>

        </div>

    @endforeach

</div>

