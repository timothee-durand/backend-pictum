<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Malette;
use Faker\Generator as Faker;

$factory->define(Malette::class, function (Faker $faker) {
    return [
        "nom" => $faker->name,
        "ref" => $faker->randomElement(["L1_MAL_PHOTO_01", "L1_MAL_SON_01", "L1_MAL_PHOTO_02", "L1_MAL_PHOTO_03"]),
        "photo" => $faker->imageUrl(200, 200)
    ];
});
