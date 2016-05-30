<!-- LES MENUS -->
<nav class="navbar navbar-scriba navbar-static-top" role="navigation" style="margin-bottom: 0">
  
    <!-- Titre du back end -->
    <div id="hbar" class="navbar-header">
          <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a id="hbar-title" class="navbar-brand" href="/legal-notice">
            <div>
                <img src="/img/plume.png" alt="scriba">
                Scriba
            </div>
           
        </a>
    </div>
    @if (Auth::check())
        <!-- Menu Outils horizontal -->
        @include('back/template/partials/menu_h')
        
        <!-- Menu principal vertical -->
        @include('back/template/partials/menu_v')
    @endif
</nav>