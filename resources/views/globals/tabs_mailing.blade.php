

<ul class="nav nav-tabs nav-bold nav-tabs-line">

	<li class="nav-item">
		<a class="nav-link navlink {{ (request()->is('admin/*/mailing/campagnes*'))||(request()->is('admin/mailing/campaigns')) ? 'active' : '' }}"
		   href="{{route('sendportal.campaigns.index',$workspaceId)}}">Campagnes</a>
	</li>
	
	<li class="nav-item">
		<a class="nav-link navlink {{ (request()->is('admin/*/mailing/templates*')) || (request()->is('admin/mailing/templates')) ? 'active' : '' }}"
		   href="{{route('sendportal.templates.index',$workspaceId)}}">Modèles</a>
	</li>
	
	<li class="nav-item">
		<a class="nav-link navlink {{ (request()->is('admin/*/mailing/subscribers*')) || (request()->is('admin/mailing/subscribers')) ? 'active' : '' }}"
		   href="{{route('sendportal.subscribers.index',$workspaceId)}}">Abonnés</a>
	</li>
	
	
	<li class="nav-item">
		<a class="nav-link navlink {{ (request()->is('admin/*/mailing/liste-contacts*')) || (request()->is('admin/mailing/liste-contacts')) ? 'active' : '' }}"
		   href="{{route('sendportal.tags.index',$workspaceId)}}">Liste contacts</a>
	</li>
	
	<li class="nav-item">
		<a class="nav-link navlink {{ (request()->is('admin/*/mailing/email-services*'))|| (request()->is('admin/mailing/email-services*'))  ? 'active' : '' }}"
		   href="{{route('sendportal.email_services.index',$workspaceId)}}">Email services</a>
	</li>
	
	<li class="nav-item">
		<a class="nav-link navlink {{ (request()->is('admin/*/mailing/statistiques*'))|| (request()->is('admin/mailing/email-services*'))  ? 'active' : '' }}"
		   href="{{route('sendportal.statistics.parametrage',$workspaceId)}}">Paramétrage d'envoi</a>
	</li>
	
</ul>