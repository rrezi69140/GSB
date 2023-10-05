<?php

namespace App\dao;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


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
 }

