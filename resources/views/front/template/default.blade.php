<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Scriba</title>
	<meta name="description" content="">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<link type="image/x-icon" href="/favicon.ico" rel="icon">
	@yield('head')
	
	<!-- Bootstrap -->
	{!! Html::style('libraries/bootstrap/css/bootstrap.min.css') !!}
 	{!! Html::style('libraries/bootstrap/css/bootstrap-theme.min.css') !!}  

 	<!-- Custom Fonts -->
    {!! Html::style('libraries/font-awesome/css/font-awesome.min.css') !!}

    <!-- Style du template -->
	{!! Html::style('css/scarab-theme.css') !!}

 	<style>
 		.center
 		{
		    min-height: 100%;  /* Au cas ou le vh n'est pas reconnu' */
		    min-height: 100vh; /*Par rapport à l'element parent ex:body*/

		    /* Création du container flexible */
		    display: -webkit-box;
		    display: -moz-box;
		    display: -ms-flexbox;
		    display: -webkit-flex;
		    display: flex; 

		    /* Dans certain navigateur, il est necessaire de définir
		     *la largeur du container flexible 
		     */
		    width: 100%;

		    /* Aligne le container bootstap verticalement 
		     * CENTRAGE VERTIVAL
		     */
		    -webkit-box-align  : center;
		    -webkit-align-items: center;
		    -moz-box-align     : center;
		    -ms-flex-align     : center;
		    align-items        : center;

		    /*
		     * Le margin: 0 auto n'a pas d'effet sur les containers flexible
		     * de ce fait, il est necessaire de le centrer horizontalement d'une façon différente
		     * CENTRAGE HORIZONTAL
		     */
		    -webkit-box-pack       : center;
		    -moz-box-pack          : center;
		    -ms-flex-pack          : center;
		    -webkit-justify-content: center;
		    justify-content        : center;
		}
 	</style>
</head>

<body>
	<header>
		@yield('header')	
	</header>
	<section class="center">
		@yield('content')
	</section>

	<!-- Script des Librairies -->
	{!! Html::script('libraries/jquery/jquery-2.2.1.min.js') !!}
	{!! Html::script('libraries/bootstrap/js/bootstrap.min.js') !!}

	@yield('scripts')

</body>
</html>