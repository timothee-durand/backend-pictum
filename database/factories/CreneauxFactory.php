<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Creneaux;
use Faker\Generator as Faker;

$factory->define(Creneaux::class, function (Faker $faker) {
    return [
        "jour" =>  random_int(0, 7),
        "heure_debut_matin" => $faker->time(),
        "heure_fin_matin" => $faker->time(),
        "heure_debut_am" => $faker->time(),
        "heure_fin_am" => $faker->time(),
        "gestionnaire_id"=> \App\Gestionnaire::all()->random()->id,
    ];
});
