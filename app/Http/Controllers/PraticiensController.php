<?php


namespace App\Http\Controllers;

use App\DAO\ServicePraticien;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class PraticiensController extends Controller
{

    public function listePraticiens()
    {
        $unPrat = new ServicePraticien ();
        $mesPraticiens = $unPrat->getListePraticiens();
        $unTypePrat = new ServicePraticien ();
        $mesTypes = $unTypePrat->getTypePraticiens();

        return view('vues/RecherchePraticiens', compact('mesPraticiens','mesTypes', 'nbPraticiens'));
    }

    public function addSpecialitePrat(Request $request)
    {
        try {
            $unPrat = new ServicePraticien();

        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function supprimerSpecialite($idpraticien, $idspecialite)
    {
        try {
            $spe = new ServicePraticien();
            $spe->Supprimer($idpraticien, $idspecialite);

            $mesSpecialite = $spe->getListeSpecialite($idpraticien);
            return view('vues/ListeSpecialite', compact('mesSpecialite', 'idpraticien'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function listeSpecialite($idpraticien)
    {
        try {
            $uneSpe = new ServicePraticien();
            $mesSpecialite = $uneSpe->getListeSpecialite($idpraticien);
            $mesId = array();
            foreach ($mesSpecialite as $unS)
            {
                $mesId[] = $unS->id_specialite;
            }
            $mesSpe = $uneSpe->ListeSpecialiteAjout($mesId);


            return view('vues/ListeSpecialite', compact('mesSpecialite', 'idpraticien', 'mesSpe'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function modifierSpecialite($idpraticien, $idspecialite)
    {
        try {
            $uneSpe = new ServicePraticien();
            $uneSpecialite = $uneSpe->getSpecialitePraticien($idpraticien, $idspecialite);

            return view('vues/ModifSpecialite', compact('uneSpecialite'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function validModif(Request $request)
    {
        try {
            $idspecialite = $request->input('idspecialite');
            $idpraticien = $request->input('idpraticien');
            $diplome = $request->input('diplome');
            $coef = $request->input('coef');

            $uneSpe = new ServicePraticien();
            $uneSpe->getValidModif($idpraticien, $idspecialite, $coef, $diplome);

            return redirect("/ListeSpecialite/$idpraticien");
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

}
