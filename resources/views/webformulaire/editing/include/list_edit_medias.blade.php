<div class="row-edit-media">
    <span>Médias</span>
    <span>Lien</span>
    <span>
        --
    </span>
</div>
<div class="section-of-option">

    @foreach($champ->medias??[] as $keymedia=>$value)

        <div class="drageable-element-media">
            <div class="row-edit-media" data-index-media="{{$keymedia}}">

                <span data-name="icon">
                    <div class="symbol  symbol-30 mr-5">
                        <div class="symbol-label"
                             style="background-image: url('/media/svg/social-icons/{{$value->icon}}.svg')"></div>
                    </div>
                </span>

                <span data-name="value">
                    <input type="text" name="link" required value="{{$value->link??""}}"
                           class="input-edit-medias form-control"/>
                </span>

                <span>
                    <div class="d-flex">
                            <div class="mx-2 btnDeleteMedia cursor-pointer">
                                <i class="fa fa-trash mt-2"></i>
                            </div>

                        <div class="fas fa-sort handle ui-sortable-handle mx-2 mt-2 "></div>
                    </div>

                </span>
            </div>
        </div>

    @endforeach

</div>

