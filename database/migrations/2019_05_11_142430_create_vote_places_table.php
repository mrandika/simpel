<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->string('uid', 25);
            $table->unsignedBigInteger('usersInCharge');
            $table->unsignedInteger('provinceId');
            $table->unsignedInteger('districtId');
            $table->unsignedInteger('subDistrictId');
            $table->unsignedInteger('urbanVillageId');

            $table->foreign('usersInCharge')->references('id')->on('users');
            $table->foreign('provinceId')->references('id')->on('provinces');
            $table->foreign('districtId')->references('id')->on('districts');
            $table->foreign('subDistrictId')->references('id')->on('sub_districts');
            $table->foreign('urbanVillageId')->references('id')->on('urban_villages');
        });

        DB::table('vote_places')->insert(
            [
                'id' => 1,
                'number' => 1,
                'uid' => "GAJAWABMENANG",
                'usersInCharge' => 2,
                'provinceId' => 1,
                'districtId' => 1,
                'subDistrictId' => 1,
                'urbanVillageId' => 1,
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_places');
    }
}
