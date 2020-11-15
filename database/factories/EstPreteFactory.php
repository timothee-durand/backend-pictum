<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EstPrete;
use Faker\Generator as Faker;

$factory->define(EstPrete::class, function (Faker $faker) {
    return [
        "date_debut"=>$faker->dateTime(),
        "date_fin"=>$faker->dateTime(),
        "materiel_id"=>\App\Materiel::all()->random()->id,
        "reservation_id"=>\App\Reservation::all()->random()->id,
        "rendu"=>$faker->dateTime(),
    ];
});
