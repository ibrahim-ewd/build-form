<ul class="nav nav-tabs nav-bold nav-tabs-line">

    <li class="nav-item">
        <a class="nav-link  {{request()->is('admin/client/*')?'active':''}}"  href="{{route('client.show',$Profil->id)}}">{{__('forms.Compte_Client')}}</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link  {{request()->is('admin/calltraking/*')?'active':''}} "  href="{{route('cleverphone.create',$Profil->id)}}">{{__("app.Calltraking")}}</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{request()->is('admin/formulaires/*')?'active':''}}" href="{{route('webformulaire.show',$Profil->id)}}">{{__("app.Webformulaires")}}</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{app('request')->input('tab')=="Mailing"?'active':''}}"
                    href="{{route('sendportal.campaigns.index',$Profil->id)}}?tab=Compaigns">{{__("app.Mailing")}}</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{app('request')->input('tab')=="Ereputaion"?'active':''}}" href="?tab=Ereputaion">{{__("app.Ereputaion")}}</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link
            {{request()->is('admin/statistiques/*')?'active':''}}"  href="{{route('Statistiques.index',$Profil->id)}}">{{__("app.Statistiques")}}</a>
    </li>
    
</ul>
