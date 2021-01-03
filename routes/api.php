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

//Route::prefix('queue-monitor')->group(function () {
//    Route::queueMonitor();
//});


Route::middleware(['cors', 'force.json'])->group(function () {

    Route::post('login', "LoginController@login");
    Route::apiResource('reservations', 'ReservationController', ["only"=>["store"]]);

    Route::get('email/verify/{mail}', 'VerificationController@verify')->name('verification.verify'); // Make sure to keep this as your route name
    Route::get('email/resend/{id_univ}', 'VerificationController@resend')->name('verification.resend');
    Route::get('email/send/new-password/{id_univ}', 'PasswordResetController@reset');


    Route::post("ldap/verify", "LoginController@verifyLDAP");
    Route::get("ldap/all", "LoginController@getLDAPUsers");

    Route::apiResource('gestionnaires', 'GestionnaireController', ["only"=>["index", "show", "store"]]);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('password/change', 'PasswordResetController@setPassword');
        //routes api
        Route::apiResource('types', 'TypeController', ["only"=>["index", "show"]]);
        Route::apiResource('blacklists', 'BlacklistController', ["only"=>["index", "show"]]);
        Route::apiResource('malettes', 'MaletteController', ["only"=>["index", "show"]]);
        Route::apiResource('departements', 'DepartementController', ["only"=>["index", "show"]]);
        Route::apiResource('reservations', 'ReservationController', ["only"=>["index", "show", "update"]]);
        Route::apiResource('estpretes', 'EstPreteController', ["only"=>["index", "store"]]);
        Route::apiResource('materiels', 'MaterielController', ["only"=>["index", "show"]]);
        Route::apiResource('gestionnaires', 'GestionnaireController', ["only"=>["index", "show"]]);
        Route::apiResource('indisponibilites', 'IndisponibiliteController', ["only"=>["index", "show"]]);
        Route::apiResource('creneaux', 'CreneauxController', ["only"=>["index"]]);

        Route::get("gestionnaires/{id}/rdv", "GestionnaireController@getRendezVous");

        Route::post("send-mail-contact-admin", "MailPersoController@contactAdmin");




        //Route::middleware("only.gest")->group(function () {

            Route::post("send-mail-gest", "MailPersoController@makeMailPerso");

            Route::apiResources([
                'types' => 'TypeController',
                'blacklists' => 'BlacklistController',
                'malettes' => 'MaletteController',
                'departements' => 'DepartementController',
                'materiels' => 'MaterielController',
                'indisponibilites' => 'IndisponibiliteController',
            ],
            ['only'=>["store", "destroy", "update"]]);

            Route::apiResource('creneaux', 'CreneauxController', ["only"=>["store"]]);
            Route::apiResource('estpretes', 'EstPreteController', ["only"=>["destroy", "update"]]);
        Route::apiResource('reservations', 'ReservationController', ["only"=>["destroy"]]);
        Route::apiResource('gestionnaires', 'GestionnaireController', ["only"=>["destroy", "update"]]);

//            Route::post("departements/update/{id}", 'DepartementController@update');
//            Route::post("types/{id}", 'TypeController@update');
//            Route::post("blacklists/{id}", 'BlacklistController@update');
//            Route::post("malettes/{id}", 'MaletteController@update');
//            Route::post("estpretes/{id}", 'EstPreteController@update');
//            Route::post("reservations/{id}", 'ReservationController@update');
//            Route::post("gestionnaires/{id}", 'GestionnaireController@update');
//            Route::post("indisponibilites/{id}", 'IndisponibiliteController@update');
//            Route::post("creneaux/{id}", 'CreneauxController@update');


        //});
    });


   // Route::get('logout', "LoginController@logout");




});



