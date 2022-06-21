<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offre;
use Faker\Generator as Faker;

$factory->define(Offre::class, function (Faker $faker) {
    return [
        'type'=>$faker->randomElement($array = array ('Location','Vente')),
        'adresse'=>$faker->address,
        'image'=>$faker->imageUrl($width = 50, $height = 30),
        'surface'=>$faker->numberBetween($min = 1, $max = 1000),
        'price'=>$faker->numberBetween($min = 1, $max = 999999),   
    ];
});
