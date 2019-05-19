<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Voters;
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

$factory->define(Voters::class, function (Faker $faker) {
    return [
        'nik' => $faker->unique()->numberBetween($min = 0000000000, $max = 9999999999),
        'rfid' => $faker->unique()->numberBetween($min = 0000000000, $max = 9999999999),
        'name' => $faker->name,
        'isVoted' => 0,
        'voteAt' => 1,
    ];
});
