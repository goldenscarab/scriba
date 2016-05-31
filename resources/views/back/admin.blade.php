@extends('back/template/default')

@section('head')

@stop

<!-- Ajout de scripts -->
@section('scripts')

@stop

@section('content')

 	<div class="container-fluid max-height">
		<div class="row max-height">
			<div id="col-left" class="col-md-12 col-lg-offset-3 col-lg-6 max-height">
				<div id="panel-list" class="panel panel-default">
					<div class="panel-heading">
						<div id="list-header" class="row flexible">
							<div class="col-xs-4">
								<h5>Admin</h5>
							</div>
							<div class="input-group custom-search-form col-xs-6">
			                    <input id="list-search" type="text" class="form-control input-sm" placeholder="Recherche...">
			                    <span class="input-group-btn">
			                    	<button id="btn-list-search" class="btn btn-default btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
			                	</span>
			                </div>
			                <div class="col-xs-2 align-right">
			                	<button id="btn-new" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
			                </div>
						</div>

					</div>
					<div id="list-content" class="max-height">
						
					</div>
				</div>
			</div>
    	</div>
	</div>

@endsection