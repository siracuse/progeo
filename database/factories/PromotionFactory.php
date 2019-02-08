<?php

use Faker\Generator as Faker;

$factory->define(App\Promotion::class, function (Faker $faker) {
    $start = $faker->dateTime('2018-10-16 20:39:21');
    $end = $faker->dateTimeInInterval($start, '+ 12 days');


    return [
        'startDate' => $start,
        'endDate' => $end,
        'name' => 'Promotion: '.str_random(3),
        'activated' => $faker->boolean,
        'promotionCode' => rand(100,999),
        'opinionCode' => rand(100,999),
        'photo1' => str_random(10),
        'photo2' => str_random(10),

        'store_id' => rand(5,10),
    ];
});
