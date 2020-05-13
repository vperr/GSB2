<?php


namespace App\DAO;
use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\DataBase\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;

class ServiceConnexion
{


    public function infoConnexion($login) {
        try {
            $info = DB::table('Visiteur')
                ->where('login_visiteur', '=', $login)
                ->first();
            return $info;
        }
        catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }


    public function login($log, $mdp){
        // Vérification du login, si il existe ou non
        if(DB :: table('Visiteur')->Where('login_visiteur', $log)->exists())
        {
            //Récup du mdp et login de la personne
            $Admin = DB::table('Visiteur')->Where('login_visiteur', $log)->first();
            //
            if (Hash::check($mdp, $Admin->pwd_visiteur))
            {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
