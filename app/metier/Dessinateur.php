<?php


namespace App\metier;
use DB;
use Illuminate\Database\Eloquent\Model;

class Dessinateur extends Model
{

    //On déclare la table manga

    protected $table = 'dessinateur';
    protected $prmaryKey = 'id_dessinateur';
    public $timestamps = false;
    protected $fillable = [
        'id_dessinateur',
        'nom_dessinateur',
        'prenom_dessinateur'
    ];

    /**
     * Get Identifiant Manga
     * @return [int] id_manga
     */

    public function getIdDessinateur(){
        return $this->getKey();
    }

    public function getListeDessinateurs(){
        $query = DB::table('dessinateur')->get();
        return $query;
    }

    public function getAuteur($id){
        $query = DB::table('dessinateur')
            ->select()
                ->where('id_dessinateur', '=', $id)
                ->first();
        return $query;
    }
}
