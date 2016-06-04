@extends('back/template/default')

@section('head')

@stop

<!-- Ajout de scripts -->
@section('scripts')
    {!! Html::script('js/admin.js') !!}
@stop

@section('content')

 	<div class="container-fluid max-height">
		<div class="row max-height">
			<div id="col-left" class="col-md-12 col-lg-offset-3 col-lg-6 max-height">
				<div id="panel-list" class="panel panel-default">
					<div class="panel-heading">
						<div id="list-header" class="row flexible">
							<div class="col-xs-10">
								<h5><i class="fa fa-users" aria-hidden="true"></i> Gestion Utilisateur</h5>
							</div>
			                <div class="col-xs-2 text-right">
			                	<button id="btn-new-user" class="btn btn-default btn-sm">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
			                </div>
						</div>

					</div>
					<div id="list-content" class="max-height">
						@include('back.partials.admin-list')
					</div>
				</div>
			</div>
    	</div>
	</div>

    <!-- Fenêtre modal -->
    <div class="modal fade" id="modalAdminUser" tabindex="-1" role="dialog" aria-labelledby="modalDialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title theme-scriba" id="modalAddLabel">Ajout / Modification d'un Utilisateur</h5>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/sb-admin/save-user') }}">
                <div class="modal-body">
                    @include('back.partials.admin-update');
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button id="btn-user-save" type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection