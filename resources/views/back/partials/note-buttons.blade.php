<button id="btn-modify" class="btn btn-default btn-sm {{ $modify or '' }}"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;Modifier</button>
<button id="btn-save" class="btn btn-default btn-sm {{ $save or '' }}"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Enregister</button>
<button id="btn-delete" class="btn btn-default btn-sm {{ $delete or '' }}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;Supprimer</button>
<!-- <button id="btn-export" class="btn btn-default btn-sm "><i class="fa fa-share" aria-hidden="true"></i>&nbsp;&nbsp;Exporter</button> -->
&#8202;
<div class="dropdown align-right"> 
	<button class="btn btn-default btn-sm dropdown-toggle {{ $export or '' }}" type="button" data-toggle="dropdown" aria-haspopup="true" >
	<i class="fa fa-share"></i> Exporter <i class="fa fa-caret-down"></i></button>
	<ul class="dropdown-menu">
		<li><a href="/note/export/json/{{ $note->id }}" class="change"><i class="fa fa-file-text-o"></i>&nbsp;Fichier JSON</a></li>
		<li><a href="/note/export/csv/{{ $note->id }}" class="change"><i class="fa fa-file-excel-o"></i>&nbsp;Fichier CSV</a></li>
		<li class="disabled"><a href="#" class="change"><i class="fa fa-file-code-o"></i>&nbsp;Fichier XML</a></li>
		<li class="disabled"><a href="#" class="change"><i class="fa fa-file-pdf-o"></i>&nbsp;Fichier PDF</a></li>
		<li role="separator" class="divider"></li>
		<li class="disabled"><a href="#" class="del"><i class="fa fa-envelope-o"></i>&nbsp;Vers E-mail</a></li>
	</ul>
</div>
