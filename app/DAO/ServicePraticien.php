<?php


namespace App\DAO;
use App\Exceptions\MonException;
use DB;
use Illuminate\Database\QueryException;

class ServicePraticien
{


    public function  getListePraticiens() {
        $mesPraticiens = DB::table('praticien')
            ->Join('type_praticien', 'type_praticien.id_type_praticien', '=', 'praticien.id_type_praticien')
            ->get();

        return $mesPraticiens;
    }

    public function getTypePraticiens() {
        $mesTypes = DB::table('type_praticien')
            ->get();

        return $mesTypes;
    }

    public function Supprimer($idpraticien, $idspecialite)
    {
        try {
            DB::Table('Posseder')
                ->Where('id_praticien', '=', $idpraticien)
                ->Where('id_specialite', '=', $idspecialite)
                ->delete();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function  getListeSpecialite($idpraticien)
    {
        try {
            $mesSpecialite = DB::Table('Specialite')
                ->join('posseder', 'specialite.id_specialite', '=', 'posseder.id_specialite')
                ->Where('id_praticien', '=', $idpraticien)
                ->get();
            return $mesSpecialite;

        }  catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function getSpecialitePraticien($idpraticien, $idspecialite)
    {
        try {
            $Specialite = DB::Table('Posseder')
                ->Where('id_praticien', '=', $idpraticien)
                ->Where('id_specialite', '=', $idspecialite)
                ->first();

            return $Specialite;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }

    }

    public function getValidModif($idpraticien, $idspecialite, $coef, $diplome)
    {
        try {
            DB::Table('Posseder')
                ->Where('id_praticien', '=', $idpraticien)
                ->Where('id_specialite', '=', $idspecialite)
                ->update([
                    'coef_prescription' => $coef,
                    'diplome' => $diplome
                ]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function ListeSpecialiteAjout($tabId)
    {
        try {
            $mesSpecialite = DB::Table('Specialite')
                ->wherenotin('id_specialite', $tabId)
                ->get();

            return $mesSpecialite;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function AjoutSpecialite($idpraticien, $idspecialite)
    {
        try {
            DB::Table('Specialite')
                ->insert([
                    'id_praticien' => $idpraticien,
                    'id_specialite' => $idspecialite,
                    'coef_prescription' => Null,
                    'diplome' => Null
                ]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}
