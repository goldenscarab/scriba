<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\Note;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
    	$user_id = Auth::user()->id;

    	$data_view = array(
			'nb_notes_citation' => Note::userId($user_id)->type('citation')->count(),
			'nb_notes_text'     => Note::userId($user_id)->type('text')->count(),
			'nb_notes_source'   => Note::userId($user_id)->type('source')->count(),
			'nb_pictures'       => 0,

			'note_citation'	=> Note::userId($user_id)->type('citation')->orderBy('updated_at', 'desc')->first()
    	);

    	return view('back.dashboard')->with($data_view);
    }
}
