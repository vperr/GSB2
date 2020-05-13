<?php


namespace App\metier;
use Illuminate\Database\Eloquent\Model;


class Praticiens extends Model
{
    //On déclare la table praticien

    protected $table = 'praticien';
    protected $fillable = [
        'id_praticien',
        'nom_praticien',
        'prenom_praticien',
        'adresse_praticien',
        'cp_praticien',
        'ville_praticien',
        'coef_notoriete',
    ];

}
