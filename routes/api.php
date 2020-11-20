<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//routes api
Route::apiResource('types', 'TypeController');
Route::apiResource('blacklists', 'BlacklistController');
Route::apiResource('malettes', 'MaletteController');
Route::apiResource('departements', 'DepartementController');
Route::apiResource('reservations', 'ReservationController');
Route::apiResource('estpretes', 'EstPreteController');
Route::apiResource('materiels', 'MaterielController');
Route::apiResource('gestionnaires', 'GestionnaireController');
Route::apiResource('indisponibilites', 'IndisponibiliteController');

Route::get("gestionnaires/{id}/rdv", "GestionnaireController@getRendezVous");
Route::prefix("creneaux")->group(function(){
    Route::get("/", "CreneauxController@index");
    Route::post("/", "CreneauxController@store");
    Route::put("/", "CreneauxController@update");
});

