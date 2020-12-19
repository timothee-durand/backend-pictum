<?php

use Illuminate\Support\Facades\Log;
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
//    Route::get("login/cas/check", "CASController@checkAuthentification");
//    Route::get("login/cas/authenticate", "CASController@authenticate");

    Route::apiResource('reservations', 'ReservationController', ["only"=>["index", "show", "store"]]);

});



Route::middleware(['cors', 'force.json'])->group(function () {

    Route::post('login', "LoginController@login");

    Route::get('email/verify/{mail}', 'VerificationController@verify')->name('verification.verify'); // Make sure to keep this as your route name
    Route::get('email/resend/{mail}', 'VerificationController@resend')->name('verification.resend');
    Route::get('email/send/new-password/{id_univ}', 'PasswordResetController@reset');

    Route::post("ldap/verify", "LoginController@verifyLDAP");

    Route::middleware(['auth:sanctum'])->group(function () {
        //routes api
        Route::apiResource('types', 'TypeController', ["only"=>["index", "show"]]);
        Route::apiResource('blacklists', 'BlacklistController', ["only"=>["index", "show"]]);
        Route::apiResource('malettes', 'MaletteController', ["only"=>["index", "show"]]);
        Route::apiResource('departements', 'DepartementController', ["only"=>["index", "show"]]);
        //Route::apiResource('reservations', 'ReservationController', ["only"=>["index", "show", "store"]]);
        Route::apiResource('estpretes', 'EstPreteController', ["only"=>["index", "store"]]);
        Route::apiResource('materiels', 'MaterielController', ["only"=>["index", "show"]]);
        Route::apiResource('gestionnaires', 'GestionnaireController', ["only"=>["index", "show"]]);
        Route::apiResource('indisponibilites', 'IndisponibiliteController', ["only"=>["index", "show"]]);
        Route::apiResource('creneaux', 'CreneauxController', ["only"=>["index"]]);

        Route::get("gestionnaires/{id}/rdv", "GestionnaireController@getRendezVous");

        Route::post("send-mail-contact-admin", "MailPersoController@contactAdmin");


        Route::middleware("only.gest")->group(function () {

            Route::post("send-mail-gest", "MailPersoController@makeMailPerso");

            Route::apiResources([
                'types' => 'TypeController',
                'blacklists' => 'BlacklistController',
                'malettes' => 'MaletteController',
                'departements' => 'DepartementController',
                'materiels' => 'MaterielController',
                'gestionnaires' => 'GestionnaireController',
                'indisponibilites' => 'IndisponibiliteController',
            ],
            ['only'=>["store", "update", "destroy"]]);

            Route::apiResource('creneaux', 'CreneauxController', ["only"=>["store", "update"]]);
            Route::apiResource('estpretes', 'EstPreteController', ["only"=>["delete", "update"]]);


        });
    });


   // Route::get('logout', "LoginController@logout");




});



