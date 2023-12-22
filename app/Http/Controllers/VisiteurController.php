<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\dao\ServiceVisiteur;
use Illuminate\Support\Facades\Session;


class VisiteurController extends Controller
{

    /**
     * Initialise le formulaire d'authentification
     * @return type Vue formLogin
     */
    public function getLogin()
    {
        try {
            $erreur = "";
            return view('formLogin', compact('erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('formLogin', compact('erreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('FormLogin', compact('erreur'));
        }
    }


    public function signIn()
    {
        try {
            $login = Request::input('Login');
            $pwd = Request::input('pwd');
            $unVisiteur = new ServiceVisiteur();
            $connected = $unVisiteur->login($login, $pwd);


            if ($connected) {
                if (Session::get('type') === 'P') {
                    return view('Vues/homePraticien');
                } else {
                    return view('home');
                }

            } else {
                $erreur = "Login ou mot de passe inconnu";
                return view('formLogin', compact('erreur'));
            }

        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('formLogin', compact('erreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('formLogin', compact('erreur'));
        }
    }


    //partie Api

    function ListerVisiteur(){
        $unVisiteur= new ServiceVisiteur();
        $listeFrais  = response()->json($unVisiteur->getListVisiteur());
        return $listeFrais;
    }

    function ListeVisiteurByFrais($idVisiteur){
        $unVisiteur = new ServiceVisiteur();
        $listeVisiteur  = response()->json($unVisiteur->GetListeVisiteurByFrais($idVisiteur));
        return $listeVisiteur;
    }

    function SuprimerVisiteur($idVisiteur){
        $unVisiteur = new ServiceVisiteur();
        $listeVisiteur = $unVisiteur->SuprimerUnVisiteur($idVisiteur);
        return $listeVisiteur;
    }

    function creeVisiteur($request){
        $unVisiteur = new ServiceVisiteur();
        $listeVisiteur = $unVisiteur->CreateVisiteur($request);
        return $listeVisiteur;
    }

}
