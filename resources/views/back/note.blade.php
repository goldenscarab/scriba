@extends('back/template/default')

@section('head')
    <!-- Style CodeMirror (style sublime text)-->
    {!! Html::style('libraries/codemirror/lib/codemirror.css') !!}
    {!! Html::style('libraries/codemirror/addon/fold/foldgutter.css') !!}
    {!! Html::style('libraries/codemirror/addon/dialog/dialog.css') !!}
    {!! Html::style('libraries/codemirror/theme/monokai.css') !!}

@stop

<!-- Ajout de scripts -->
@section('scripts')
    <!-- Script CKEditor -->
    {!! Html::script('libraries/ckeditor/ckeditor.js') !!}

    <!-- Script CodeMirror (style sublime text)-->
    {!! Html::script('libraries/codemirror/lib/codemirror.js') !!}
    {!! Html::script('libraries/codemirror/addon/hint/show-hint.js') !!}
    {!! Html::script('libraries/codemirror/addon/hint/xml-hint.js') !!}
    {!! Html::script('libraries/codemirror/addon/hint/html-hint.js') !!}
    {!! Html::script('libraries/codemirror/mode/xml/xml.js') !!}
    {!! Html::script('libraries/codemirror/mode/css/css.js') !!}
    {!! Html::script('libraries/codemirror/mode/htmlmixed/htmlmixed.js') !!}
    {!! Html::script('libraries/codemirror/addon/search/searchcursor.js') !!}
    {!! Html::script('libraries/codemirror/addon/search/search.js') !!}
    {!! Html::script('libraries/codemirror/addon/dialog/dialog.js') !!}
    {!! Html::script('libraries/codemirror/addon/edit/closetag.js') !!}
    {!! Html::script('libraries/codemirror/addon/edit/closebrackets.js') !!}
    {!! Html::script('libraries/codemirror/addon/edit/matchbrackets.js') !!}
    {!! Html::script('libraries/codemirror/addon/comment/comment.js') !!}
    {!! Html::script('libraries/codemirror/addon/wrap/hardwrap.js') !!}
    {!! Html::script('libraries/codemirror/addon/fold/foldcode.js') !!}
    {!! Html::script('libraries/codemirror/mode/javascript/javascript.js') !!}
    {!! Html::script('libraries/codemirror/mode/php/php.js') !!}
    {!! Html::script('libraries/codemirror/addon/mode/loadmode.js') !!}
    {!! Html::script('libraries/codemirror/mode/meta.js') !!}
    {!! Html::script('libraries/codemirror/mode/sql/sql.js') !!}
    {!! Html::script('libraries/codemirror/mode/shell/shell.js') !!}
    {!! Html::script('libraries/codemirror/addon/hint/sql-hint.js') !!}
    {!! Html::script('libraries/codemirror/mode/clike/clike.js') !!}
    {!! Html::script('libraries/codemirror/keymap/sublime.js') !!}
    {!! Html::script('js/note.js') !!}
@stop

@section('content')

 	<div class="container-fluid max-height">
		<div class="row max-height">
			<div id="col-left" class="col-md-12 col-lg-4 no-margin max-height">
				<div id="panel-list" class="panel panel-default">
					<div class="panel-heading">
						<div id="list-header" data-type="{{ $type }}" class="row flexible">
							<div class="col-xs-4">
								<h5 class="theme-scriba">{{ $title }}</h5>
							</div>
							<div class="input-group custom-search-form col-xs-6">
			                    <input id="list-search" type="text" class="form-control input-sm" placeholder="Recherche...">
			                    <span class="input-group-btn">
			                    	<button id="btn-list-search" class="btn btn-default btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
			                	</span>
			                </div>
			                <div class="col-xs-2 align-right">
			                	<button id="btn-new-note" class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
			                </div>
						</div>

					</div>
					<div id="list-content" class="max-height">
						@include('back.partials.notes-list')
					</div>
				</div>
			</div>

			<div id="note-content" class="col-md-12 col-lg-8 no-margin max-height">
				<div class="well">
					<!-- TODO Include d'une vue par defaut -->
				</div>
			</div>
		</div>
	</div>

@endsection