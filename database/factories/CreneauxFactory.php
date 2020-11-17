<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Creneaux;
use Faker\Generator as Faker;

function randomHour ($sStartDate, $sEndDate, $sFormat = 'H:i:s')
{
    // Convert the supplied date to timestamp
    $fMin = strtotime($sStartDate);
    $fMax = strtotime($sEndDate);

    // Generate a random number from the start and end dates
    $fVal = mt_rand($fMin, $fMax);

    // Convert back to the specified date format
    return date($sFormat, $fVal);
}

$factory->define(Creneaux::class, function (Faker $faker) {
    return [
        "jour" =>  random_int(0, 5),
        "heure_debut_matin" => randomHour("06:00", "09:00"),
        "heure_fin_matin" => randomHour("11:00", "12:00"),
        "heure_debut_am" => randomHour("13:00", "14:00"),
        "heure_fin_am" => randomHour("16:00", "18:00"),
        "gestionnaire_id"=> \App\Gestionnaire::all()->random()->id,
    ];
});


