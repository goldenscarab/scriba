<div id="content-wrap" class="container-fluid">
	<div class="row">
		<div id="content-header" class="col-xs-12">
			<div class="col-md-12 col-lg-5"><h5><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ajout / Modification</h5></div>
			<div class="col-md-12 col-lg-7 text-right btn-action">
				@include('back.partials.note-buttons', ['modify' => 'disabled', 'export' => 'disabled', 'delete' => 'disabled'])
			</div>
		</div>
	</div>
	<div id="content-body" class="container-fluid">
		<div class="form-group has-feedback col-sm-12">
			<br>
			@if(isset($note->id))
				<input name="note_id" type="hidden" value="{{ $note->id }}">
			@endif

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
				<input type="text" class="form-control" title="Nom de la note" name="note_name" placeholder="Nom de la note" value="{{ $note->name or "" }}">
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-bookmark-o" aria-hidden="true"></i></span>
				<input type="text" class="form-control" title="Sujet de la note" name="note_subject" placeholder="Sujet" value="{{ $note->subject or "" }}">
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" title="Contenu de la note" name="note_author" placeholder="Auteur" value="{{ $note->author or "" }}">
			</div>

			@if($note->type == "citation")
				<br>
				<input name="note_type" type="hidden" value="citation">
				<div class="input-group col-xs-12">
					<textarea id="editor-citation" class="form-control" rows="25" name="note_content" placeholder="Contenu de la Citation">{{ $note->content or "" }}</textarea>
				</div>
			@elseif($note->type == "text")
				<br>
				<input name="note_type" type="hidden" value="text">
				<div class="input-group col-xs-12">
					<textarea id="editor-text" class="form-control" rows="25" name="note_content" placeholder="Contenu du texte">{{ $note->content or "" }}</textarea>
				</div>
				<script>
				    CKEDITOR.config.skin = 'kama'; //Thème : office2013 ; kama ; moono
				    CKEDITOR.config.language = 'fr';
				    CKEDITOR.config.height = 370;
				    CKEDITOR.config.contentsCss = ['/libraries/bootstrap/css/bootstrap.min.css', '/libraries/ckeditor/contents.css']; //Style dans l'éditeur

					var map = CodeMirror.keyMap.sublime;
					var area_editor = null;

					CKEDITOR.replace('editor-text');
				</script>
			@elseif($note->type == "source")
				<br>
				<input name="note_type" type="hidden" value="source">
				<div class="input-group col-xs-12 col-sm-3">
					<label class="control-label" for="note_language">Langage</label>
					<select class="form-control" name="note_language" onChange="setModeCodeMirror(editorCode, $(this).val());">
				        <option {{ $note->language == "php" ? "selected" : "" }} value="php">PHP Html</option>
				        <option {{ $note->language == "js" ? "selected" : "" }} value="js">JavaScript</option>
				        <option {{ $note->language == "css" ? "selected" : "" }} value="css">CSS</option>
				        <option {{ $note->language == "sql" ? "selected" : "" }} value="sql">SQL</option>
				        <option {{ $note->language == "sh" ? "selected" : "" }} value="sh">Bash</option>
				    </select>
				</div>
				&nbsp;
				<div class="input-group col-xs-12">
					<textarea id="editor-source" class="form-control" rows="50" name="note_content" placeholder="Contenu Code Source">{{ $note->content or "" }}</textarea>
				</div>
				<script>
					//Paramétrage de la boite de saisie de code (CodeMirror)
					var editorCode = CodeMirror.fromTextArea(document.getElementById("editor-source"),
					{
						lineNumbers: true,
						lineWrapping: true,
						mode: "application/x-httpd-php",
						keyMap: "sublime",
						extraKeys: {"Ctrl-Space": "autocomplete"},
						autoCloseBrackets: true,
						autoCloseTags: true,
						matchBrackets: true,
						showCursorWhenSelecting: true,
						theme: "monokai",
						tabSize: 4,
						indentUnit: 4,
        				indentWithTabs: true,
        				gutter: true,
					});

					function setModeCodeMirror(editor, ext)
					{
						//Récupération de l'objet de language CodeMirror
						var info = CodeMirror.findModeByExtension(ext);
						var mode = info.mime; //Récupération du type de codage

						//console.log(info);
						//Paramétrage de CodeMirror
						editor.setOption("mode", mode);
					}

					//Uniquement si nouvelle note
					@if(!isset($note->id))
						//Init du nombre de ligne dans la boite de saisie de code
						var minLine = 5;
						var defaultValue = "";
						for (var i = 1 ; i < minLine ; i++) defaultValue += "\n";
						editorCode.setValue(defaultValue);
					@endif

					//Init de la coloration syntaxique
					var language = $('select[name="note_language"]').val(); //Récupèration de la valeur du selecteur
					setModeCodeMirror(editorCode, language); //Paramétrage de CodeMirror

				</script>
			@else
				<p style="color:red">Impossible de créer une nouvelle note</p>
			@endif
		</div>
	</div>
</div>

