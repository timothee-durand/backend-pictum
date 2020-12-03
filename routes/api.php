<?php

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

Route::middleware(['cors', 'force.json'])->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        //routes api
        Route::apiResource('types', 'TypeController', ["only"=>["index", "show"]]);
        Route::apiResource('blacklists', 'BlacklistController', ["only"=>["index", "show"]]);
        Route::apiResource('malettes', 'MaletteController', ["only"=>["index", "show"]]);
        Route::apiResource('departements', 'DepartementController', ["only"=>["index", "show"]]);
        Route::apiResource('reservations', 'ReservationController', ["only"=>["index", "show"]]);
        Route::apiResource('estpretes', 'EstPreteController', ["only"=>["index", "show"]]);
        Route::apiResource('materiels', 'MaterielController', ["only"=>["index", "show"]]);
        Route::apiResource('gestionnaires', 'GestionnaireController', ["only"=>["index", "show"]]);
        Route::apiResource('indisponibilites', 'IndisponibiliteController', ["only"=>["index", "show"]]);
        Route::apiResource('creneaux', 'CreneauxController', ["only"=>["index"]]);

        Route::get("gestionnaires/{id}/rdv", "GestionnaireController@getRendezVous");


        Route::middleware("only.gest")->group(function () {

            Route::post("send-mail", "MailPersoController@makeMailPerso");

            Route::apiResources([
                'types' => 'TypeController',
                'blacklists' => 'BlacklistController',
                'malettes' => 'MaletteController',
                'departements' => 'DepartementController',
                'materiels' => 'MaterielController',
                'gestionnaires' => 'GestionnaireController',
                'indisponibilites' => 'IndisponibiliteController'
            ],
            ['only'=>["store", "update", "destroy"]]);

            Route::apiResource('creneaux', 'CreneauxController', ["only"=>["store", "update"]]);


        });
    });

    Route::post('login', "LoginController@login");


});



