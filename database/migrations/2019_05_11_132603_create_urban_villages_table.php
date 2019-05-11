<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrbanVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urban_villages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subDistrictId');
            $table->string('name');
            $table->foreign('subDistrictId')->references('id')->on('sub_districts');
        });

        DB::table('urban_villages')->insert(
            [
                'id' => 1,
                'subDistrictId' => 1,
                'name' => "PABUARAN",
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
        Schema::dropIfExists('urban_villages');
    }
}
