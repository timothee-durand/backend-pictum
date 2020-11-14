<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Indisponibilite;
use Faker\Generator as Faker;

$factory->define(Indisponibilite::class, function (Faker $faker) {
    return [
        "date_debut"=>$faker->dateTime(),
        "date_fin"=>$faker->dateTime(),
        "gestionnaire_id"=>\App\Gestionnaire::all()->random()->id
    ];
});
