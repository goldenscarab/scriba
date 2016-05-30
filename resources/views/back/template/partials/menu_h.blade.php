
<ul id="hbar-menu" class="nav navbar-top-links navbar-right text-right">
    <!-- Menu Option -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-cog "></i> Option <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu">
        <li><a href="{{ url('/note/export/json') }}" class="change"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Exporter les notes</a></li>
        <li><a href="#" data-toggle="modal" data-target="#modalImportNote" class="del"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Importer des notes</a></li>
        </ul>
    </li>
    <!-- Menu Utilisateur -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li class="disabled"><a href="#"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;Mon Profil</a>
            </li>
            <li class="disabled"><a href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;Paramètres</a>
            </li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;Deconnexion</a>
            </li>
        </ul>
    </li>
</ul>

