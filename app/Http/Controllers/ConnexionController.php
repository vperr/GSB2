<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\ServiceConnexion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ConnexionController
{
    public function signIn(Request $request)
    {
        try {
            $login = $request->input ('login');
            $password = $request->input ('password');
            $log = new ServiceConnexion();
            $visiteur = $log->infoConnexion($login);

            if ($visiteur != null) {
                if (Hash::check($password , $visiteur->pwd_visiteur)) {
                    Session::put('id', $login);
                    return redirect('/');
                } else {
                    $erreur = "Mot de passe incorrect !";
                    return view('vues.SignIn', compact("erreur"));
                }
            } else {
                $erreur = "Indentifiant incorrect !";
                return view('vues.SignIn', compact("erreur"));
            }
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function Deconnexion() {
        Session::forget('id');
        return redirect('/');
    }
}
