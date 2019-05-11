<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidatesName', 50);
            $table->string('candidatesSex', 15);
            $table->string('candidatesJobs');
            $table->string('viceName', 50);
            $table->string('viceSex', 15);
            $table->string('viceJobs');
            $table->bigInteger('voteCount');
            $table->boolean('accepted');
            $table->timestamps();
        });

        DB::table('candidates')->insert(
            [
                'id' => 1,
                'candidatesName' => "Nurhadi",
                'candidatesSex' => "Laki-Laki",
                'candidatesJobs' => "Kang Pijet",
                'viceName' => "Aldo",
                'viceSex' => "Laki-Laki",
                'viceJobs' => "Tokoh Fiktif",
                'voteCount' => 0,
                'accepted' => 1,
            ]
        );

        DB::table('candidates')->insert(
            [
                'id' => 2,
                'candidatesName' => "Iras",
                'candidatesSex' => "Perempuan",
                'candidatesJobs' => "Pengajar",
                'viceName' => "Itis",
                'viceSex' => "Perempuan",
                'viceJobs' => "Tokoh Fiktif",
                'voteCount' => 0,
                'accepted' => 1,
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
        Schema::dropIfExists('candidates');
    }
}
