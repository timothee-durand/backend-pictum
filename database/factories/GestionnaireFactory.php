<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gestionnaire;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Gestionnaire::class, function (Faker $faker) {
    return [
        "nom"=>$faker->firstName(),
        "prenom"=>$faker->lastName,
        "mail"=>$faker->email,
        "id_univ"=>$faker->userName,
        "admin"=>$faker->boolean(10),
        "password"=>$faker->password
    ];
});
