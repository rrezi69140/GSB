<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Api Frais

Route::get('/GetListeFrais', [\App\Http\Controllers\FraisController::class, "ListerFrais"]);
Route::get('/GetListeFraisByVisiteur/{idVisiteur}', [\App\Http\Controllers\FraisController::class, "ListeFraisByVisiteur"]);
Route::delete('/SupprimerUnFrais/{$idFrais}', [\App\Http\Controllers\FraisController::class, "SuprimerFrais"]);


// api Visiteur

Route::get('/GetListeVisiteur', [\App\Http\Controllers\VisiteurController::class, "ListerVisiteur"]);
Route::get('/GetListeVisiteurByFrais/{idFrais}', [\App\Http\Controllers\VisiteurController::class, "ListeVisiteurByFrais"]);
Route::delete('/SupprimerUnVisiteur/{idVisiteur}', [\App\Http\Controllers\VisiteurController::class, "SuprimerVisiteur"]);
Route::post('/CrationVisiteur/{request}', [\App\Http\Controllers\VisiteurController::class, "creeVisiteur"]);

