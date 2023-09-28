<?php
namespace App\dao;

 class ServiceVisiteur
 {


     public function Login($login, $pwd)
     {
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
         } catch (QueryException $e) {
             throw new MonException($e->getMessage(), 5);
         }
         return $connected;
     }

     public function Logout() {
         Session::put('id', 0);
     }
 }

