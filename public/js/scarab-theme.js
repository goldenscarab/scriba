$(document).ready(function()
{

	// Les écoutes
	// La recherche
	$('#list-search').keyup(function(e)
	{
		//Détection de la touche entrée
		if(e.keyCode == 13)
		{
			$('#btn-list-search').trigger('click');
		}
	});

	$('#btn-list-search').on('click', function()
	{

		var note_data = {
			type: $('#list-header').data('type'),
			search: $('#list-search').val()
		}

		//Lancement de la recherche sur le serveur
		var result_list = getAjaxAction('search', note_data);

		//Mise à jour de la liste des note dans le panneaux
		updatePanelList(result_list);
	});
	
	// Ecoute sur les élements de la liste des notes
	$('#panel-list').on('click', '.note-wrap', function()
	{
		//On récupère l'ID de l'item sélectionné
		var id = $(this).data('id');

		//On envoi une action ajax mode 'get'
		var note_html = getAjaxAction('get_id', {id: id})

		//Mise à jour du panneau de contenu
		updatePanelContent(note_html);
	});

	//Ecoute sur le bouton ajouté une note
	$('#panel-list').on('click', '#btn-new-note', function()
	{
		//On récupère le nom type de note à créer
		var type = $('#list-header').data('type');

		//On envoi une action ajax mode 'get'
		var form_html = getAjaxAction('new', {type: type})

		//Mise à jour du panneau de contenu
		updatePanelContent(form_html);
	});

	//Ecoute sur les boutons du contenu
	$('#note-content').on('click', '#btn-modify', function()
	{
		if(!$(this).hasClass('disabled'))
		{
			//Récupération de l'id de la note
			var id = $('#content-body').data('id');

			//On envoi une action ajax mode 'update'
			var form_html = getAjaxAction('update', {id: id});

			//Mise à jour du panneau de contenu
			updatePanelContent(form_html);

		}
	});

	$('#note-content').on('click', '#btn-save', function()
	{
		if(!$(this).hasClass('disabled'))
		{
			//Type de note
			var type = $('input[name="note_type"]').val();

			//Récupération du contenu
			var content = null;

			switch(type)
			{
				case 'citation' : 	content = $('textarea[name="note_content"]').val(); break;
				case 'text' : 		content = CKEDITOR.instances['editor-text'].getData(); break;
				case 'source' : 	content = editorCode.getValue() ;break;
				default : "";
			}

			//Récupération des données de champs
			var note_data = {
				id: $('input[name="note_id"]').val(),
				type: type,
				language: $('select[name="note_language"]').val(),
				name: $('input[name="note_name"]').val(),
				subject: $('input[name="note_subject"]').val(),
				author: $('input[name="note_author"]').val(),
				content: content,
			};

			//On envoi une action ajax mode 'save'
			var list_html = getAjaxAction('save', note_data) //TODO Traiter le retour en seule fois.

			//Mise à jour de la liste des note dans le panneaux
			updatePanelList(list_html);

			//On envoi une action ajax mode 'get'
			var note_html = getAjaxAction('get_last', null);

			//Mise à jour du panneau de contenu
			updatePanelContent(note_html);
		}
	});

	$('#note-content').on('click', '#btn-delete', function()
	{
		if(!$(this).hasClass('disabled'))
		{
			//Récupération des infos de la note
			var note_data = {
				id: $('#content-body').data('id'),
				type: $('#content-body').data('type')
			};

			//On envoi une action ajax mode 'save'
			$list_html = getAjaxAction('del', note_data ) // TODO Traiter le retour en seule fois.

			//Nettoyage du contenu du panneaux
			$('#note-content .well').html("");

			//Mise à jour de la liste des note dans le panneaux
			updatePanelList($list_html);
		}
	});
});

function getAjaxAction(mode, data)
{
	var html = null;

	$.ajax(
	{
		url      : 'ajax_action',
		headers	 : { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
		type     : 'POST',
		dataType : 'html',
		async    : false, //Default true
		data     : { 'mode': mode, 'data' : data },
		success  : function(result){html = result},
		error    : function(result){html = false},
	});
	
	//Retourne le résultat de la fonction ajax, false si erreur
	return html;
}

function updatePanelList(html)
{
	//Vérification du bon traitement
	var dom_add = (html != false) ? html : "<span style=\"color:#FF0000;\"> Erreur de traitement...</span>";

	//Ajout dans le dom
	$('#list-content').html(dom_add);
}

function updatePanelContent(html)
{
	//Vérification du bon traitement
	var dom_add = (html != false) ? html : "<span style=\"color:#FF0000;\"> Erreur de traitement...</span>";

	//Ajout dans le dom
	$('#note-content .well').html(dom_add);
}

