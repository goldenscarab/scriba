@extends('back/template/default')

@section('head')

@stop

<!-- Ajout de scripts -->
@section('scripts')

@stop

@section('content')

 	<div class="container-fluid max-height">
		<div class="row max-height">
			<div id="bloc-note-list" class="col-md-12 col-lg-4 no-margin max-height">
				<div id="panel-note-list" class="panel panel-default">
					<div class="panel-heading">
						<div id="note-list-header" class="row flexible">
							<div class="col-xs-4">
								<h5>Admin</h5>
							</div>
							<div class="input-group custom-search-form col-xs-6">
			                    <input id="note-search" type="text" class="form-control input-sm" placeholder="Recherche...">
			                    <span class="input-group-btn">
			                    	<button id="btn-note-search" class="btn btn-default btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
			                	</span>
			                </div>
			                <div class="col-xs-2 align-right">
			                	<button id="btn-new" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
			                </div>
						</div>

					</div>
					<div id="note-list-content" class="max-height">
						
					</div>
				</div>
			</div>

			<div id="note-content" class="col-md-12 col-lg-8 no-margin max-height">
				<div class="well">
					
				</div>
			</div>
		</div>
	</div>

@endsection