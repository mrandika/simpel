<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\VotePlace;
use Illuminate\Support\Str;
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

$factory->define(VotePlace::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween($min = 1, $max = 50),
        'uid' => Str::random(10),
        'usersInCharge' => $faker->numberBetween($min = 1, $max = 10000),
        'provinceId' => $faker->numberBetween($min = 1, $max = 35),
        'districtId' => $faker->numberBetween($min = 1, $max = 416),
        'subDistrictId' => $faker->numberBetween($min = 1, $max = 6542),
        'urbanVillageId' => $faker->numberBetween($min = 1, $max = 6632),
    ];
});
