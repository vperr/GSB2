<?php


namespace App\metier;
use DB;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //On déclare la table manga

    protected $table = 'genre';
    protected $prmaryKey = 'id_genre';
    public $timestamps = false;
    protected $fillable = [
        'id_genre',
        'lib_genre'
    ];

    /**
     * Get Identifiant Manga
     * @return [int] id_manga
     */

    public function getIdGenre(){
        return $this->getKey();
    }

    public function getListeGenres(){
        $query = DB::table('genre')->get();
        return $query;
    }
}
