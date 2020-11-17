<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Departement;
use Faker\Generator as Faker;

$factory->define(Departement::class, function (Faker $faker) {
    return [
        "lat"=>$faker->latitude,
        "long"=>$faker->longitude,
        "nom"=>$faker->city,
        "gestionnaire_id"=>\App\Gestionnaire::all()->random()->id,
    ];
});
