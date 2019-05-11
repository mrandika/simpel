<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_districts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('districtId');
            $table->string('name');
            $table->foreign('districtId')->references('id')->on('districts');
        });

        DB::table('sub_districts')->insert(
            [
                'id' => 1,
                'districtId' => 1,
                'name' => "BOJONG GEDE",
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
        Schema::dropIfExists('sub_districts');
    }
}
