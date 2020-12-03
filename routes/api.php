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
Route::group(['json.response', 'cors'], function (){

   Route::middleware(["auth"])->group(function () {
        //routes api
        Route::apiResource('types', 'TypeController');
        Route::apiResource('blacklists', 'BlacklistController');
        Route::apiResource('malettes', 'MaletteController');
        Route::apiResource('departements', 'DepartementController');

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
    });

    Route::apiResource('reservations', 'ReservationController');
    Route::post("login", "LoginController@login");
    Route::get("users", "LoginController@getLoggedUsers");
});

//Route::group(['middleware' => ['cors', 'json.response']], function () {
//
//});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


