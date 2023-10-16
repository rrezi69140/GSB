<?php

namespace App\Http\Controllers;

use App\dao\ServiceFrais;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\metier\Frais;
use Exception;
use App\Exceptions\MonException;

class FraisController extends Controller
{
    public function getFraisVisiteur()
    {
        try {

            $monErreur = Session::get('erreur');
            Session::forget('monErreur');
            $unServiceFrais = new ServiceFrais();
            $id_visiteur = Session::get('id');
            $mesFrais = $unServiceFrais->getFrais($id_visiteur);
            $erreur = $monErreur;
            return view('listeFrais', Compact('mesFrais', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        }
    }


    public function updateFrais($id_frais)
    {
        try {
            $monErreur = Session::get('erreur');;
            $unServiceFrais = new ServiceFrais();
            $erreur = $monErreur;
            $unFrais = $unServiceFrais->getById($id_frais);
            $titreVue = "Modification d'une fiche de Frais";
            return view('Vues/formFrais', compact('unFrais', 'titreVue', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('erreur'));
        }
    }


    public function validateFrais()
    {
        try {
            $id_frais = Request::input('id_frais');
            $anneemois = Request::input('anneemois');
            $nbjustificatifs = Request::input('nbjustificatifs');
            $unServiceFrais = new ServiceFrais();
            if ($id_frais > 0) {
                $unServiceFrais->updateFrais($id_frais, $anneemois, $nbjustificatifs);
            } else {
                $montant = Request::input('montant');
                $id_visiteur = Session::get('id');
                $unServiceFrais->insertFrais($anneemois, $nbjustificatifs, $id_visiteur, $montant);
                return redirect('/getListeFrais');
            }
        } catch
        (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('Vues/pageErreur', compact('monErreur'));
        }
    }
}
