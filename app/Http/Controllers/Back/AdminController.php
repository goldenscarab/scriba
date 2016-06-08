<?php

namespace App\Http\Controllers\Back;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('back.admin')->with(compact('users'));
    }

    public function ajaxAction()
    {
    	$mode = Input::get('mode');

        if(Input::ajax())
    	{
    		switch($mode)
    		{
    			case 'new' :
    				return view('back.partials.admin-update');
    				break;
    			case 'delete' :
                    $user_id = Input::get('data.user_id');

                    User::destroy($user_id);
               


    			default:
                    exit;
    		}
    	}
    }

    public function saveUser()
    {
        $user_data = Input::all();

        //Création de la validation des champs
        $validator = Validator::make($user_data, [
            'name'     => 'required|between:3,20',
            'password' => 'required|confirmed|min:6',
            'email'    => 'required|email|max:255|unique:users,email,'.Input::get('id')
        ]);

        // Si erreur de validation...
        if ($validator->fails()) 
        {
            return redirect($_SERVER['HTTP_REFERER']."#modalAdminUser")->withErrors($validator)->withInput();
        }

        // Si c'est une modification
        if(isset($user_data['id']))
        {
            $user = User::findOrFail($user_data['id']);
        }
        else
        {
            $user = new User;
        }

        // Valorisation de l'objet User
        $user->name = $user_data['name'];
        $user->email = $user_data['email'];
        $user->password = bcrypt($user_data['password']);
        if(isset($user_data['admin']))
        {
            $user->admin = true;
        }
        else
        {
            $user->admin = false;
        }

        $user->save();
        
        return Redirect::back();
    }
}
