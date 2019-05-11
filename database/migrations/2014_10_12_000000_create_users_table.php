<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                'id' => 1,
                'name' => "andika",
                'email' => "andika@gmail.com",
                'password' => '$2y$10$DsZeHzulen.WwPXpgtKs2u8kcUv/F8RIbmSmfrMZSKNKRxqu97KuC',
            ]
        );

        DB::table('users')->insert(
            [
                'id' => 2,
                'name' => "andiki",
                'email' => "andiki@gmail.com",
                'password' => '$2y$10$DsZeHzulen.WwPXpgtKs2u8kcUv/F8RIbmSmfrMZSKNKRxqu97KuC',
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
        Schema::dropIfExists('users');
    }
}
