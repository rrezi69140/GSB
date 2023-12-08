<?php

namespace App\dao;

use App\Models\Frai;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceFrais
{
    public function getFrais($id_visiteur)
    {
        try {
            $lesFrais = DB::table('frais')
                ->Select()
                ->where('frais.id_visiteur', '=', $id_visiteur)
                ->get();
            return $lesFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getById($id_frais)
    {
        try {
            $leFrais = DB::table('frais')
                ->Select()
                ->where('id_frais ', '=', $id_frais)
                ->get();
            return $leFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function updateFrais($id_frais, $anneemois, $nbjustificatifs)
    {
        try {
            $dateJour = date("Y-m-d");
            DB::table('frais')
                ->where('id_frais', '=', $id_frais)
                ->update(['anneemois' => $anneemois, 'nbjustificatifs' => $nbjustificatifs, 'datemodification' => $dateJour]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
//Partie Api

    public function ListeFrais()
    {
        try {

            //$ListFrais = response()->json(Frai::all());

            $ListFrais = Frai::all();
            return $ListFrais;

        }
        catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }

    public function ListeFraisByVisiteur($idVisiteur)
    {
        try {

            //$ListFrais = response()->json(Frai::all());

            $ListFrais = Frai::with(idVisiteur,$idVisiteur);
            return $ListFrais;

        }
        catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }
}
