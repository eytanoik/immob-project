<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Demande;
use Faker\Generator as Faker;

$factory->define(Demande::class, function (Faker $faker) {
    return [
        'type'=>$faker->randomElement($array = array ('Location','Vente')),
        'adresse'=>$faker->address,
        'surface_min'=>$faker->numberBetween($min = 1, $max = 1000),
        'surface_max'=>$faker->numberBetween($min = 1, $max = 1000),
        'price_min'=>$faker->numberBetween($min = 1, $max = 999999),
        'price_max'=>$faker->numberBetween($min = 1, $max = 999999),
    ];
});
