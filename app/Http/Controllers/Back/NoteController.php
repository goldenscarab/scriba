<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Note;
use App\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth; //Authentification
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\Debugbar\Facade;
use \Carbon\Carbon;
use \Debug;

class NoteController extends Controller
{
    public function __construct()
    {
        
    }

    public function citation()
    {
        
        $dataview = array(
            'title' => "Citation",
            'type' => "citation",
            'notes' => Note::userId(Auth::user()->id)->type('citation')->orderBy('updated_at', 'desc')->get()
        );
        return view('back.note')->with($dataview);
    }

    public function text()
    {
        $dataview = array(
            'title' => "Texte",
            'type' => "text",
            'notes' => Note::userId(Auth::user()->id)->type('text')->orderBy('updated_at', 'desc')->get()
        );

        return view('back.note')->with($dataview);
    }

    public function source()
    {
        $dataview = array(
            'title' => "Code Source",
            'type' => "source",
            'notes' => Note::userId(Auth::user()->id)->type('source')->orderBy('updated_at', 'desc')->get()
        );

        return view('back.note')->with($dataview);
    }

    public function ajax_action()
    {
        if(Request::ajax() && Input::has('mode'))
        {
           //Récupération du mode
            $mode = Input::get('mode');

            switch ($mode) 
            {
                case 'all':

                    break;
                case 'get_id':
                    // Récupération de l'id de la note
                    $note_id = Input::get('data.id');

                    // Récupération des données de la note
                    $note = Note::userId(Auth::user()->id)->orderBy('updated_at', 'desc')->find($note_id);

                    //Sauvegarde de cet id en session
                    Session::put('note_id', $note_id);

                    // Renvoi de la vue avec la données
                    return view('back.partials.note-view')->with(compact('note'));
                    break;
                case 'get_last' :
                    //Récupération du dernier id de note consulté
                    $note_id = Session::get('note_id');

                    // Récupération de la dernière note consultée ou mis à jour
                    $note = Note::userId(Auth::user()->id)->find($note_id);

                    return view('back.partials.note-view')->with(compact('note'));
                    break;

                case 'new':
                    // Récupération du type de note à créer
                    $note = new Note;
                    $note->type = Input::get('data.type');

                    return view('back.partials.note-update')->with('note', $note);
                    break;
                
                case 'update':
                    //Récupération de l'id de la note
                    $note_id = Input::get('data.id');

                    //Récupération de la note
                    $note = Note::findOrFail($note_id);

                    return view('back.partials.note-update')->with(compact('note'));
                    break;

                case 'save':
                    
                    $note = null;
                    
                    if(!empty(Input::get('data.id'))) 
                    {
                        $note = Note::findOrFail(Input::get('data.id'));
                    }
                    else
                    {
                        $note = new Note;
                    }  
                    $note->type     = Input::get('data.type');
                    $note->name     = Input::get('data.name');
                    $note->subject  = Input::get('data.subject');
                    $note->language = Input::get('data.language');
                    $note->author   = Input::get('data.author');
                    $note->content  = Input::get('data.content');
                    $note->user_id  = Auth::user()->id;

                    //Sauvegarde dans la base de données
                    $note->save();

                    //Sauvegarde de cet id en session
                    Session::put('note_id', $note->id);

                    break;

                case 'del':
                    $id = Input::get('data.id');
                    
                    Note::destroy($id);
                    break;
                case 'search':
                    $type = Input::get('data.type');
                    $search = Input::get('data.search');

                    $notes = Note::userId(Auth::user()->id)->type($type)->search($search)->orderBy('updated_at', 'desc')->get();

                    return view('back.partials.notes-list')->with('notes', $notes);
                    break;

                default:
                    echo false; exit();
                    break;
            }

            //On retourne la liste des notes du type actuel
            //Récupération du type de note
            $type = Input::get('data.type');

            //Récupération des notes en fonction du type
            $notes = $this->getAllNoteOfType($type);

            return view('back.partials.notes-list')->with('notes', $notes);
        }
    }

    private function getAllNoteOfType($type)
    {
       return Note::userId(Auth::user()->id)->type($type)->orderBy('updated_at', 'desc')->get();
    }

    
    public function import_json()
    {
        // Récupération des infos du fichier uploader
        $file = Input::file('file-json');

       // dd(Input::file('file-json')->getMimeType());

        // Création de la validation en passant les données de post, les règles et le message
        $validator = Validator::make(Request::all(), ['file-json' => 'required|mimes:json,txt,js']);

        //Validation de la cohérence des données et que le fichier est bien un fichier json
        if ($validator->fails()) 
        {
            Session::flash('error', 'Type de fichier non pris en charge');
            return Redirect::back();
        }
        else 
        {
            // Vérification si le fichier est valide
            if ($file->isValid()) 
            {
                //Récupération du nom de fichier temporaire sur le serveur
                $file_path_name = $file->getRealPath();
                
                // Import du fichier dans la base
                if($this->update_with_json_file($file_path_name))
                {
                    Session::flash('success', 'Import des notes effectué avec succée'); 
                }
                else
                {
                    Session::flash('error', 'Erreur lors de l\'import'); 
                }
            }
            else 
            {
                Session::flash('error', 'Fichier non valide');
                
            }
            return Redirect::back();
        }
    }

    private function update_with_json_file($file)
    {
        if(file_exists($file))
        {
            //Lecture du fichier d'import
            // $handle = fopen($file, "r"); //Ouverture du fichier en lecture
            // $dataFile = fread($handle, filesize($file)); //Lecture de la totalité du fichier
            // fclose($handle); //Fermeture du fichier
            $data_json = file_get_contents($file);
            
            //Décodage du fichier d'import
            $notes_import = json_decode($data_json);
            //dd($notes_import);


            //Ajout de la validation
            //[ "notes_import.*.type" => 'required|in:citation,text,source']

            //Parcours des différentes notes pour ajout
            foreach ($notes_import as $n) 
            {
                $note = new Note;
                $note->type       = $n->type;
                $note->name       = $n->name;
                $note->content    = $n->content;
                $note->author     = $n->author;
                $note->subject    = $n->subject;
                $note->language   = $n->language;
                $note->user_id    = Auth::user()->id;
                $note->created_at = $n->created_at;
                $note->updated_at = $n->updated_at;
                
                $note->save();
            }

            return true;
        }
        return false;

    }


    /*Les exports*/
    public function export_json($note_id = null)
    {
        //Enclenche le tampon de sortie et bloque les données autre que les entêtes
        ob_start(); 

        if($note_id != null)
        {
            $note = Note::userId(Auth::user()->id)->selectForExport()->findOrFail($note_id);
            $json = $note->toJson();
            $file_name = str_slug('note_'.$note->name, '_');
        }
        else
        {
            $notes = Note::userId(Auth::user()->id)->selectForExport()->get();
            $json = $notes->toJson();
            $file_name = str_slug('notes_'.Auth::user()->name, '_');
        }

        //On utilise le cache, alors il faut le nettoyer
        
        ob_clean(); //Nettoyage du cache 
         
        //Ouverture du fichier sans afficher d'eventuelles erreurs
        $fh = @fopen( 'php://output', 'w' );
         
        @fwrite($fh, $json); //Ecriture dans le fichier
        
        //Paramétrage du header pour téléchargement du fichier en mode forcé
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: application/json");
        header("Content-Disposition: attachment; filename={$file_name}.json");
        header("Expires: 0");
        header("Pragma: public");

        // Fermeture du fichier
        @fclose($fh);
        
        //Eteint la temporisation de sortie
        ob_end_flush(); //Envoie les données au navigateur
        exit;

    }



    public function export_csv($note_id)
    {
        //Enclenche le tampon de sortie et bloque les données autre que les entêtes
        ob_start(); 

        $note = Note::userId(Auth::user()->id)->selectForExport()->findOrFail($note_id);

        $note_tab[0] = $note->toArray();
        $file_name = str_slug('note_'.$note->name, '_');

        //On utilise le cache, alors il faut le nettoyer
        ob_clean(); //Nettoyage du cache 
         
        //Ouverture du fichier sans afficher d'eventuelles erreurs
        $fh = @fopen( 'php://output', 'w' );
         
        //Init de la première ligne 
        $header_displayed = false;
         
        //Parcours du tableau des valeurs à mettre dans le fichier 
        foreach ( $note_tab as $ligne ) 
        {
            // Vérification si première ligne non ajoutée
            if ( !$header_displayed )
            {
                //Ajout des titres des colonne (= clefs)
                @fputcsv($fh, array_keys($ligne), ';', '"');
                $header_displayed = true;
            }
         
            // Ajout des données pour chaque ligne
            @fputcsv($fh, $ligne, ';', '"');
        }
        
        //Paramétrage du header pour téléchargement du fichier en mode forcé
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$file_name}.csv");
        header("Expires: 0");
        header("Pragma: public");

        // Fermeture du fichier
        @fclose($fh);
        
        ob_end_flush(); //Envoie les données au navigateur
        exit;
    }


}
