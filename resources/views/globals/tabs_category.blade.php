

<ul class="nav nav-tabs nav-bold nav-tabs-line">

	<li class="nav-item">
		<a class="nav-link navlink {{ (request()->is('admin/modeles-defaut*'))||(request()->is('admin/modeles-defaut')) ? 'active' : '' }}"
		   href="{{route('sendportal.default_templates.index')}}">Modèles par défaut</a>
	</li>
	
	<li class="nav-item">
		<a class="nav-link navlink {{ (request()->is('admin/modele-categorie*')) || (request()->is('admin/modele-categorie')) ? 'active' : '' }}"   href="{{route('sendportal.category_templates.index')}}">Modèles de catégories</a>
	</li>

</ul>