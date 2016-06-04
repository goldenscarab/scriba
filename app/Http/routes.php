<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::auth();

Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');


//Authentification requise
Route::group(['middleware' => ['auth'], ], function ()
{
	Route::get('/', 'Back\HomeController@index');
	Route::get('sb-admin', 'Back\AdminController@index');
	Route::post('sb-admin/save-user', 'Back\AdminController@saveUser');
	Route::post('sb-admin/ajax-action', 'Back\AdminController@ajaxAction');
	Route::get('dashboard', 'Back\DashboardController@index');
	Route::get('legal-notice', 'Back\HomeController@notice');

	Route::group(['prefix' => 'note'], function()
	{
		Route::get('citation', 'Back\NoteController@citation');
		Route::get('text', 'Back\NoteController@text');
		Route::get('source', 'Back\NoteController@source');

		Route::post('ajax_action', 'Back\NoteController@ajax_action');

		
		Route::post('import/json', 'Back\NoteController@import_json');
		Route::get('export/json', 'Back\NoteController@export_json');
		Route::get('export/json/{id}', 'Back\NoteController@export_json');
		Route::get('export/csv/{id}', 'Back\NoteController@export_csv');
		Route::get('export/xml/{id}', 'Back\NoteController@export_xml');
		Route::get('export/pdf/{id}', 'Back\NoteController@export_pdf');
		Route::get('export/mail/{id}', 'Back\NoteController@export_mail');
	});

	//Route::get('gallery', 'Back\GalleryController@gallery');
});


