<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/*$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});*/


$factory->define(App\Zone::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
    	'state_id' => rand(1, 3)
    ];
});



$factory->define(App\District::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
    	'zone_id' => rand(1, 10)
    ];
});



$factory->define(App\MunicipalityVdc::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'type' => $faker->randomElement(['vdc', 'municipality']),
    	'district_id' => rand(1, 10)
    ];
});


$factory->define(App\Ward::class, function (Faker $faker) {
    return [
        'name' => $faker->buildingNumber,
        'ref_id' => rand(1,10)
    ];
});



$factory->define(App\ConstituencyArea::class, function (Faker $faker) {
    return [
        'name' => $faker->secondaryAddress,
        'ward_id' =>rand(1, 10),
    ];
});