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
    	//Récupération de l'ID utilisateur
        $user_id = Auth::user()->id;

    	//Récupération de toute les notes
        $notes_all = Note::userId($user_id)->select('content', 'updated_at', 'type')->orderBy('updated_at', 'desc')->get();

        //On compte le nombre de notes total
        $nb_note_total = $notes_all->count();

        //On calcul la taille total du contenu des notes
        $size_all = 0;
        foreach ($notes_all as $note) 
        {
            $size_all += strlen($note->content);
        }

        //Convertion de la taille en chaine de caractère
        $str_size_all = number_format($size_all, 0, ',', ' ')." Octets";

        //Dernière note 
        $last_note = $notes_all->first();

        
    

        $data_view = array(
			
            'nb_notes_total'    => $nb_note_total,
            'size_all'          => $size_all,
            'last_note'         => $last_note,
            'nb_notes_citation' => Note::userId($user_id)->type('citation')->count(),
            'nb_notes_text'     => Note::userId($user_id)->type('text')->count(),
            'nb_notes_source'   => Note::userId($user_id)->type('source')->count(),
            'nb_pictures'       => 0,

			'note_citation'	=> Note::userId($user_id)->type('citation')->orderBy('updated_at', 'desc')->first()
    	);

    	return view('back.dashboard')->with($data_view);
    }
}
