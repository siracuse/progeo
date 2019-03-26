<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => rand(1111111111,9999999999),
        'email' => $faker->unique()->safeEmail,
        'siret' => rand(11111111111111,99999999999999),
        'photoInside' => str_random(10),
        'photoOutside' => str_random(10),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'city_id' => rand(1, 36700),
        'category_id' => rand(1, 4),
        'subcategory_id' => rand(1, 11),
        'user_id' => User::where('is_resp', '=', '1')->inRandomOrder()->first()->id
    ];
});
