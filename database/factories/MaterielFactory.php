<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Materiel;
use Faker\Generator as Faker;

$factory->define(Materiel::class, function (Faker $faker) {
    return [
        "ref"=>$faker->randomElement(["L2_ENR_ZOOM_01", "L2_LIG_MAND_01", "L2_PER_RHO_01"]),
        "photo"=>$faker->imageUrl(200,200),
        "usage"=>$faker->realText(200),
        "carac"=>$faker->realText(200),
        "tutos"=>"[{text:'tutos1', url:'https://www.youtube.com/watch?v=40umrwsHoO4'}, {text:'tutos2', url:'https://www.youtube.com/watch?v=kvC3XWZL8vE'}]",
        "notice"=> "http://blog.foto24.com/manuel-utilisation-panasonic-lumix-dmc-fz300.pdf",
        "indisp"=>$faker->boolean(30),
        "indisp_raison"=>$faker->realText(50),
        "type_id"=>\App\Type::all()->random()->id,
        "malette_id"=>\App\Malette::all()->random()->id,
        "departement_id"=>\App\Departement::all()->random()->id,
    ];
});
