<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        "valide"=>$faker->boolean(50),
        "prof"=> $faker->boolean(30),
        "nom_emprunteur"=> $faker->firstName,
        "prenom_emprunteur"=>$faker->lastName,
        "mail_emprunteur"=>$faker->email,
        "id_univ_emprunteur"=>$faker->uuid
    ];
});
