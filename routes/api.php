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


// route de l'api

Route::get('/GetListeFrais', [\App\dao\ServiceFrais::class, "ListeFrais"]);

Route::get('/GetListeFraisByVisiteur/{idVisiteur}', [\App\dao\ServiceFrais::class, "ListeFraisByVisiteur"]);
Route::get('/GetListeVisiteur', [\App\dao\ServiceVisiteur::class, "ListeVisiteur"]);
