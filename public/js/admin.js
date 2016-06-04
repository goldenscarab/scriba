$(document).ready(function()
{
	if(document.location.hash == "#modalAdminUser") $('#modalAdminUser').modal('show');

	$('#panel-list').on('click', '#btn-new-user', function()
	{
		//var html_form = getAjaxAction('new', null)

		//$('#modalAdminUser .modal-body').html(html_form);

		$('#modalAdminUser').modal('show');
	});

	$('#panel-list').on('click', '.change', function()
	{
		console.log('change');
	});

	$('#panel-list').on('click', '.delete', function()
	{
		var user_id = $(this).parents('[data-id]').data('id');
		getAjaxAction('delete', {user_id: user_id});

		document.location.reload();
	});

	// $('#modalAdminUser').on('click', '#btn-user-save', function()
	// {
	// 	//Récupération des infos
	// 	var user_data = {
	// 		name: $('#modalAdminUser input[name="name"]').val(),
	// 		mail: $('#modalAdminUser input[name="mail"]').val(),
	// 		password: $('#modalAdminUser input[name="password"]').val(),
	// 		admin: $('#modalAdminUser input[name="admin"]:checked').val()
	// 	};
	// 	console.log(user_data);

	// 	//Enregistrer des infos en ajax
	// 	getAjaxAction('save', user_data);
	// });


});

function getAjaxAction(mode, data)
{
	var html = null;

	$.ajax(
	{
		url      : '/sb-admin/ajax-action',
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
