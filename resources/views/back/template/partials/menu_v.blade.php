<div id="vbar" class="navbar-scriba sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <br><br>
            <li>
                <a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i>&nbsp;&nbsp;Tableau de bord</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-envira"></i>&nbsp;&nbsp;Notes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/note/citation') }}"><i class="fa fa-quote-right" aria-hidden="true"></i>&nbsp;&nbsp;Citation</a>
                    </li>
                    <li>
                        <a href="{{ url('/note/text') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;Texte</a>
                    </li>
                    <li>
                        <a href="{{ url('/note/source') }}"><i class="fa fa-code" aria-hidden="true"></i>&nbsp;&nbsp;Code source</a>
                    </li>
                </ul>
            </li>
            <li class="disabled">
                <a href="#"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;&nbsp;Gallerie</a>
            </li>
          

   
           
           

        </ul>
    </div>

</div>