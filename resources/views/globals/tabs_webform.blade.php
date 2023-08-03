<ul class="nav nav-tabs nav-bold nav-tabs-line">
    <li class="nav-item">



        <a class="nav-link  {{$current_rout=="webformulaire.show" ? 'active':''}}"
           href="{{route('webformulaire.show',$form['clients_id'])}}">Formulaire </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{$current_rout=="category.index" ? 'active':''}}"  href="{{route('category.index')}}">Catégories</a>
    </li>

    <li class="nav-item">
        <a class="nav-link  {{$current_rout=="confirmation.index" ? 'active':''}}"
           href="{{route('confirmation.index')}}">Confirmation </a>
    </li>


</ul>
