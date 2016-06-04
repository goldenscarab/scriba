<div id="content-wrap" class="container-fluid">
	<div class="row">
		<div id="content-header" class="col-xs-12">
			<div class="col-md-12 col-lg-5"><h5 class="theme-scriba"><i class="fa fa-eye" aria-hidden="true"></i> Consultation</h5></div>
			<div class="col-md-12 col-lg-7 text-right btn-action">
				@include('back.partials.note-buttons', ['save' => 'disabled'])
			</div>
		</div>
	</div>
	<div id="content-body" data-id="{{ $note->id }}" data-type="{{ $note->type }}" class="container-fluid">
		
		<!-- Adapter ici le contenu par rapport au type de note -->
		
		<div id="content-dates" class="col-xs-12 text-right">
			<p>Modifiée le : {{ $note->updated_at->format('d/m/Y H:i') }} - Crée le : {{ $note->created_at->format('d/m/Y H:i') }}</p>
			<p></p>
		</div>
		<div id="content-name" class="col-xs-12">
			{{ $note->name }}
		</div>
		<div id="content-subject" class="col-xs-12">
			{{ $note->subject }}
		</div>
		@if($note->type == 'citation')
			<div id="content-content-citation" class="col-xs-12">
				{{ $note->content }}
			</div>
			<div class="separator-gothic col-xs-12 text-center"></div>
			<div id="content-author" class="col-xs-12 text-right">
				{{ $note->author }}
			</div>
		@elseif($note->type == 'text')
			<div class="separator-classic col-xs-12 text-center"></div>
			<div id="content-content-text" class="col-xs-12">
				{!! $note->content !!}
			</div>
		@elseif($note->type == 'source')
			&nbsp;<br>
			<div class="col-xs-12 text-right">Langage : {!! $note->language or 'php' !!}&nbsp;&nbsp;</div>
			<div id="content-content-source" class="col-xs-12">
				<textarea id="viewer-source" class="form-control" rows="25" name="note_content" placeholder="Contenu Code Source">{{ $note->content or "" }}</textarea>
			</div>
			<script>
				var viewerCode = CodeMirror.fromTextArea(document.getElementById("viewer-source"),
				{
					lineNumbers: true,
					lineWrapping: true,
					readOnly: true,
					theme: "monokai",
					cursorBlinkRate: -1 /*Curseur caché si négatif*/
				});
				//Récupération de l'objet de language CodeMirror
				var info = CodeMirror.findModeByExtension('{!! $note->language or 'php' !!}');
				var mode = info.mime; //Récupération du type de codage

				//Paramétrage de CodeMirror
				viewerCode.setOption("mode", mode);
			</script>


		@else
		@endif

	</div>
</div>

	