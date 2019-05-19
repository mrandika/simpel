<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\District;
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

$factory->define(District::class, function (Faker $faker) {
    return [
        'provinceId' => $faker->numberBetween($min = 1, $max = 35),
        'name' => $faker->state,
    ];
});
