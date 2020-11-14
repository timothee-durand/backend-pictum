<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        "nom"=>$faker->randomElement(["Lumiere", "Prise de vue", "Son"]),
        "picto"=>$faker->imageUrl(30,30)
    ];
});
