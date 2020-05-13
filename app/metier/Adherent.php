<?php


namespace App\metier;
use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    //On déclare la table adherent

    protected $table = 'adherent';

    protected $fillable = [
        'id_adherent',
        'nom_adherent',
        'prenom_adherent',
        'ville_adherent',
    ];
    public $timestamps = true;
}
