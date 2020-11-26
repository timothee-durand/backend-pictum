<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EstPrete;
use Faker\Generator as Faker;

function getDateRendu($faker)
{
    $rendu = random_int(0, 1);
    $date_rendu = $faker->dateTimeBetween("2020-01-01", "2020-12-31");
    $dateNonRendu = $faker->dateTimeBetween("2020-12-31", "2021-01-30");
    if ($rendu === 0) {
        return [$date_rendu, $date_rendu];
    }
    else {
        return [$date_rendu, $dateNonRendu];
    }
}

$factory->define(EstPrete::class, function (Faker $faker) {


    $dates = getDateRendu($faker);

    return [
        "date_debut" => $faker->dateTimeBetween("2020-01-01", "2020-12-31"),
        "date_fin" => $dates[0],
        "materiel_id" => \App\Materiel::all()->random()->id,
        "reservation_id" => \App\Reservation::all()->random()->id,
        "rendu" => $dates[1],
        "gestionnaire_id" => \App\Gestionnaire::all()->random()->id,
    ];
});
