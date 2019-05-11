<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->string('nik', 20)->unique();
            $table->string('rfid', 25)->unique();
            $table->string('name', 50);
            $table->boolean('isVoted');
            $table->unsignedInteger('voteAt');

            $table->foreign('voteAt')->references('id')->on('vote_places');
        });

        DB::table('voters')->insert(
            [
                'nik' => "0028447100",
                'rfid' => "0877488230",
                'name' => "MUHAMMAD RIZKI ANDIKA",
                'isVoted' => 0,
                'voteAt' => 1,
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
        Schema::dropIfExists('voters');
    }
}
