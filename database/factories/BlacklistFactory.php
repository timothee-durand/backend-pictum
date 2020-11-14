<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blacklist;
use Faker\Generator as Faker;

$factory->define(Blacklist::class, function (Faker $faker) {
    return [
        "nom" => $faker->firstName(),
        "prenom" => $faker->lastName,
        "mail" => $faker->email,
        "id_univ"=> $faker->randomElement([06574, 98467, 3748, 34563])
    ];
});
