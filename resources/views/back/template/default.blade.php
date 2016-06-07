<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Scriba</title>
	<meta name="description" content="">
	<meta name="robots" content="noindex, nofollow, nodp, nocache, notranslate">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<link type="image/x-icon" href="/favicon.ico" rel="icon">
	@yield('head')
	
	<!-- Bootstrap -->
	{!! Html::style('libraries/bootstrap/css/bootstrap.min.css') !!}
 	{!! Html::style('libraries/bootstrap/css/bootstrap-theme.min.css') !!}  

 	<!-- MetisMenu CSS -->
	{!! Html::style('libraries/sbadmin2/metisMenu/dist/metisMenu.min.css') !!} 
    
    <!-- Style du panneau Admin -->
    {!! Html::style('libraries/sbadmin2/dist/css/sb-admin-2.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('libraries/font-awesome/css/font-awesome.min.css') !!}

	<!-- Style du template -->
	{!! Html::style('css/scarab-theme.css') !!}


	
</head>

<body>
	<header>
		@yield('header')	
	</header>
	<div id="wrapper">
        <!-- La navigation -->
        @include('back/template/partials/navigation')

        <!-- Le contenu -->
        @include('back/template/partials/content')

        <!-- Fenêtre Modal personnalisable -->
        @include('back/template/partials/modal_import_notes')

    </div>
	<div id="elements_bottom">
        <footer role="contentinfo">
    		@yield('footer')
    		<p class="text-center"><small>Copyright &copy; Goldenscarab 2016</small></p>
    	</footer>
    </div>

	<!-- Script des Librairies -->
	{!! Html::script('libraries/jquery/jquery-2.2.1.min.js') !!}
	{!! Html::script('libraries/bootstrap/js/bootstrap.min.js') !!}
	
	<!-- Metis Menu Plugin JavaScript -->
	{!! Html::script('libraries/sbadmin2/metisMenu/dist/metisMenu.min.js') !!}

    <!-- Script du panneau admin -->
    {!! Html::script('libraries/sbadmin2/dist/js/sb-admin-2.js') !!}

    <!-- Script pour boite de dialogue boostrap -->
    {!! Html::script('libraries/bootbox.min.js') !!}

	<!-- Script du template -->
	{!! Html::script('js/scarab-theme.js') !!} 
	
	

	@yield('scripts')

</body>
</html>