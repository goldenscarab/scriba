
<div id="page-wrapper">
     <div class="col-lg-12 max-height"> 
             
         <!-- Traitement du Message flash -->
        @if(Session::has('success'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				{!! Session::get('success') !!} <!-- Affichage du message success -->
			</div>
		@endif
		@if(Session::has('error'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				{!! Session::get('error') !!} <!-- Affichage du message error -->
			</div>
		@endif

        @yield('content')

      </div> 
</div>
