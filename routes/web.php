<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;
use Illuminate\Http\Request;
use App\Http\Controllers\FraisController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout/master');
});

Route::get( '/formlogin', [VisiteurController::class, 'getLogin']);

Route::post( '/login', [VisiteurController::class, 'signIn']);


Route::get( '/getLogout', [ServiceVisiteur::class, 'Logout']);



Route::get('/getListeFrais', [FraisController::class,'getFraisVisiteur']);


