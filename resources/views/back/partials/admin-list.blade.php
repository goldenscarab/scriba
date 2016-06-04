<div class="panel-body">
	<div class="container-fluid items-list col-xs-12">
		@forelse($users as $u)
			<div class="item-wrapper row" data-id="{{ $u->id }}">
				<div class="col-xs-10">
					<div class="item-line col-xs-12">
						<div class="note-name col-xs-7">{{ $u->name }}</div>
						<div class="note-date col-xs-5 text-right">{{ $u->updated_at->diffForHumans() }}</div>
					</div>
					<div class="item-line col-xs-12">
						<div class="note-subject col-xs-7">{{ $u->email }}</div>
						<div class="note-size col-xs-5 text-right">{{ $u->admin == true ? "Admin" : "" }}</div>
					</div>
				</div>
				
				<div class="col-xs-2 text-right action">
					<div class="dropdown">
						<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" >
							<i class="glyphicon glyphicon-cog"></i>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#" class="change"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Modifier</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#" class="delete"><i class="glyphicon glyphicon-trash"></i>&nbsp;Supprimer</a></li>
						</ul>
					</div>
				</div>
			</div>
		@empty
			<div class="item-wrapper-disabled row" data-id="1">
				<div class="item-line col-xs-12">
					Aucun élements à afficher...
				</div>
			</div>
		@endforelse
	</div>
</div>
<div class="panel-footer">
	{{ sizeof($users)." élement(s)" }}				
</div>


