<?php

namespace App\dao;


use App\metier\Visiteur;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Translation\Extractor\Visitor\TranslatableMessageVisitor;


class ServiceVisiteur
{


    /**
     * Authentifie le visiteur sur son login et Mdp
     * Si c'est OK, son id est enregistrer dans la session
     *Cela lui donne accès au menu général (voir page master)
     * @param type $login Login du visiteur * @param type $pwd MdP du visiteur
     * @return boolean: True or false
     */
    public function login($login, $pwd) {

        $connected = false;
        try {
            $visiteur = DB::table('visiteur')
                ->select()
                ->where('login_visiteur', '=', $login)
                ->first();
            if ($visiteur) {
                // if ($visiteur->pwd_visiteur == md5($pwd)) {
                if ($visiteur->pwd_visiteur == $pwd) {
                    Session::put('id', $visiteur->id_visiteur);
                    Session::put('type', $visiteur->type_visiteur);
                    $connected = true;
                }
            }
            }
        catch
            (QueryException $e) {

            throw new MonException($e->getMessage(), 5);
        }
        return $connected;
}

     public function Logout()
        {
            Session::put('id', 0);
        }


    //Partie Api

    //Partie Api

    public function getListVisiteur()
    {
        try {

            //$ListFrais = response()->json(Frai::all());

            $ListVisiteur = Visiteur::all();
            return $ListVisiteur;

        }
        catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }

    public function GetListeVisiteurByFrais($idFrais)
    {
        try {

        ;

            $ListVisiteur =Visiteur::where('id_visiteur',$idFrais)->get();
            return $ListVisiteur;

        }
        catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }

    public function SuprimerUnVisiteur($idVisiteur)
    {
        try {

            $ListVisiteur = Visiteur::destroy($idVisiteur);
            return $ListVisiteur;

        }
        catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }

    public function CreateVisiteur(Request $request)
    {
        try {
            $Visiteur  = new \App\Models\Visiteur();
          //= new Visiteur($request->id_laboratoire,


            $Visiteur ->id_secteur =  $request->id_secteur;
            $Visiteur ->id_secteur=$request->nom_visiteur;
            $Visiteur ->id_secteur= $request->prenom_visiteur;
            $Visiteur ->id_secteur= $request->adresse_visiteur;
            $Visiteur ->id_secteur= $request->cp_visiteur;
            $Visiteur ->id_secteur= $request->ville_visiteur;
            $Visiteur ->id_secteur= $request->date_embauche;
            $Visiteur ->id_secteur= $request->login_visiteur;
            $Visiteur ->id_secteur= $request->pwd_visiteur;
            $Visiteur ->id_secteur  =$request->type_visiteur;

            $Visiteur->Save();

        }
        catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }
 }

