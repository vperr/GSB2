<?php


namespace App\DAO;
use DB;

class ServiceVisiteur
{
    public function getPraticien($idPraticiens){
        $praticien = DB::table('praticien')
            ->select()
            ->where('id_praticien', '=', $idPraticiens)
            ->first();
        return $praticien;
    }


}
