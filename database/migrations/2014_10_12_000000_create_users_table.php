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
            $table->increments('id');
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('email')->unique();
            $table->string('telephone_number')->default('');
            $table->string('address')->default('');
            $table->string('town_city')->default('');
            $table->string('county')->default('');
            $table->string('postcode')->default('');
            $table->boolean('receive_updates')->default(0);
            $table->boolean('disney_on_ice')->default(0);
            $table->boolean('marvel_universe_live')->default(0);
            $table->boolean('monster_jam')->default(0);
            $table->timestamps();
        });
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
