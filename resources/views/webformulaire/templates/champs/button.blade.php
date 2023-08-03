@if(isset($steps))
	@php
		$f['title'] = $formById[$steps]['title'];
		$f['typeChamp'] = $formById[$steps]['typeChamp'];
		$f['name_group'] = $formById[$steps]['name_group'];
		$f['obligatior'] = $formById[$steps]['obligatior'];
	@endphp
@endif

@if(isset($f['button'])  && $f['button'] !="0" )

{{--    <div class="position-relative btn_Envoyer" style="{{$form['stylesCss']['parentBtn']??''}}">--}}
{{--        <a  class="btn btn_dark_  envoyer-button" style="{{$form['stylesCss']['btn_Envoyer']??''}}">--}}
{{--            Envoyer--}}
{{--        </a >--}}
{{--    </div>--}}

    <div class="form-group  mb-1 col-12  field_{{$k}} position-relative child_{{$f['button']}}" id="{{$f['button']}}" >

        <div class="position-relative btn_Envoyer child_{{$f['typeChamp']}}" id="{{$f['typeChamp']}}" style="{{$form['stylesCss']['parentBtn']??''}}">
                <a class="btn btn_dark_  envoyer-button" style="{{$form['stylesCss']['btn_Envoyer']??''}}"
                @if(isset($conditions[$k]['button'])&& isset($conditions[$k]['button']->link)) href="{{$conditions[$k]['button']->link}}" @endif>
                    <span>
                        @if(isset($conditions[$k]['button'])&& isset($conditions[$k]['button']->value)) {{$conditions[$k]['button']->value}}@else {{__('fields.'.$f['button'])}} @endif
                    </span>
                </a>
{{--            </div>--}}
        </div>

    </div>
@endif
