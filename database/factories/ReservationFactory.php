<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        "valide"=>$faker->boolean(50),
        "prof"=> $faker->boolean(30),
        "nom"=> $faker->firstName,
        "prenom"=>$faker->lastName,
        "email"=>$faker->email,
        "raison_pro"=>$faker->realText(250),
        "id_univ"=>$faker->userName,
        "password"=>$faker->password
    ];
});
