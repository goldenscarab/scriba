@extends('back/template/default')

@section('head')


@stop

<!-- Ajout de scripts -->
@section('scripts')

@stop

@section('content')
<div class="panel panel-default panel-background opacity-3">
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-quote-right fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ $nb_notes_citation or 0 }}</div>
								<div>Notes Citations</div>
							</div>
						</div>
					</div>
					<a href="{{ url('/note/citation')}}">
						<div class="panel-footer">
							<span class="pull-left">Voir les détails</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-file-text-o  fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ $nb_notes_text or 0 }}</div>
								<div>Notes texte</div>
							</div>
						</div>
					</div>
					<a href="{{ url('/note/text')}}">
						<div class="panel-footer">
							<span class="pull-left">Voir les détails</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-code fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ $nb_notes_source or 0 }}</div>
								<div>Notes Code-Source</div>
							</div>
						</div>
					</div>
					<a href="{{ url('/note/source')}}">
						<div class="panel-footer">
							<span class="pull-left">Voir les détails</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-picture-o fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ $nb_pictures or 0 }}</div>
								<div>Images</div>
							</div>
						</div>
					</div>
					<a href="#">
						<div class="panel-footer">
							<span class="pull-left">Voir les détails</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Statistiques
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
								@if(isset($last_note))
									<tr><td>Notes total</td><td class="text-right text-muted small">{{ $nb_notes_total}}&nbsp;Note(s)</td></tr>
									<tr><td>Taille total</td><td class="text-right text-muted small">{{ number_format($size_all, 0, ',', ' ') }}&nbsp;Octet(s)</td></tr>
									<tr><td>Dernière note</td><td class="text-right text-muted small">{{ $last_note->updated_at->diffForHumans()}}</td></tr>
									<tr><td>Type de la note</td><td class="text-right text-muted small">{{ $last_note->type == 'citation' ? "Citation" : $last_note->type == 'text' ? "Texte" : "Code-source" }}</td></tr>
								@else
									<tr><td class="text-right text-muted small">Aucune note enregistrée</td></tr>
								@endif
							</table>
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						Dernière citation
					</div>
					<div class="panel-body ">
						@if (isset($note_citation))
						<div id="content-dates" class="col-xs-12 text-right">
							<p>Modifiée le : {{ $note_citation->updated_at->format('d/m/Y H:i') }} - Crée le : {{ $note_citation->created_at->format('d/m/Y H:i') }}</p>
							<p></p>
						</div>
						<div id="content-name" class="col-xs-12">
							{{ $note_citation->name }}
						</div>
						<div id="content-subject" class="col-xs-12">
							{{ $note_citation->subject }}
						</div>

						<div id="content-content-citation" class="col-xs-12">
							{{ $note_citation->content }}
						</div>
						<div class="separator-gothic col-xs-12 text-center"></div>
						<div id="content-author" class="col-xs-3 col-xs-offset-9">
							{{ $note_citation->author }}
						</div>
						@else
							<div>Aucune citation enregistée...</div>
						@endif
					</div>
				</div>
			</div>
			
		</div>
	</div>

		
</div>

	
 	

@endsection