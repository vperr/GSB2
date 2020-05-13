<?php


namespace App\metier;
use DB;
use Illuminate\Database\Eloquent\Model;


class Specialite extends Model
{
    //On déclare la table specialite

    protected $table = 'specialite';
    protected $fillable = [
        'id_specialite',
        'lib_specialite'
    ];
}
