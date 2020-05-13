<?php


namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mangas extends Model
{
    //On déclare la table manga

    protected $table = 'manga';
    protected $primaryKey = 'id_manga';
    private $id_genre;
    private $couverture;
    private $id_dessinateur;
    private $id_scenariste;
    private $prix;
    private $titre;
    public $timestamps = false;
    protected $fillable = [
        'id_manga',
        'id_dessinateur',
        'id_scenariste',
        'prix',
        'titre',
        'couverture',
        'id_genre',
    ];

    public function getIdManga()
    {
        return $this->getKey();
    }

    public function getIdGenre()
    {
        return $this->id_genre();
    }

    public function getCouverture()
    {
        return $this->couverture();
    }

    public function  getListeMangaNoms() {
        $mesMangas = DB::table('manga')
            ->Select('id_manga', 'titre', 'genre.lib_genre', 'dessinateur.nom_dessinateur',
                'scenariste.nom_scenariste', 'prix')
            ->join('genre', 'manga.id_genre', '=', 'genre.id_genre')
            ->join('dessinateur', 'manga.id_dessinateur', '=', 'dessinateur.id_dessinateur')
            ->join('scenariste', 'manga.id_scenariste', '=', 'scenariste.id_scenariste')
            ->get();

        return $mesMangas;
    }

    public function ajoutManga($code_d, $prix, $titre, $couverture, $code_ge, $id_scenariste){
        DB::table('manga')->insert(
            ['id_dessinateur' => $code_d, 'prix' => $prix,
                'titre' => $titre, 'couverture' => $couverture, 'id_genre' => $code_ge, 'id_scenariste' => $id_scenariste]);
    }

    public function getManga($idManga){
        $manga = DB::table('manga')
            ->select()
            ->where('id_manga', '=', $idManga)
            ->first();
        return $manga;
    }

    public function modificationManga ($code, $code_d, $prix, $titre, $couverture, $code_ge, $id_scenariste)
    {
        DB::table('manga')
            ->where('id_manga', $code)
            ->update(['id_dessinateur' => $code_d, 'prix' => $prix,
                'titre' => $titre, 'couverture' =>$couverture,
                'id_genre' => $code_ge, 'id_scenariste' => $id_scenariste]);
    }
}
