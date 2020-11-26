<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Indisponibilite;
use Faker\Generator as Faker;

$factory->define(Indisponibilite::class, function (Faker $faker) {
    return [
        "date_debut"=>$faker->dateTimeBetween("2020-01-01", "2020-12-31"),
        "date_fin"=>$faker->dateTimeBetween("2020-01-01", "2020-12-31"),
        "gestionnaire_id"=>\App\Gestionnaire::all()->random()->id
    ];
});
