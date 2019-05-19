<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $petugas = factory(App\User::class, 10000)->create();
        // $provinces = factory(App\Province::class, 35)->create();
        // $districts = factory(App\District::class, 416)->create();
        // $subDistricts = factory(App\SubDistrict::class, 6542)->create();
        // $urban = factory(App\UrbanVillage::class, 6632)->create();

        // $votePlace = factory(App\VotePlace::class, 20000)->create();
        $voters = factory(App\Voters::class, 200)->create();
    }
}
