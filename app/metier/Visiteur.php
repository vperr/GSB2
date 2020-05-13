<?php


namespace App\metier;
use Illuminate\Database\Eloquent\Model;


class Visiteur extends Model
{
    protected $table = 'visiteur';
    protected $fillable = [
        'id_visiteur',
        'id_laboratoire',
        'id_secteur',
        'nom_visiteur',
        'prenom_visiteur',
        'adresse_visiteur',
        'cp_visiteur',
        'ville_visiteur',
        'date_embauche',
        'login_visiteur',
        'pwd_visiteur',
        'type_visiteur'
    ];
}
