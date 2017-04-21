<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class usersettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersettings', function (Blueprint $table){
           $table->increments('id');
            $table->integer('user_id');
            $table->string('day')->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
        $table->foreign('user_id')->references('id')->on('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usersettings');
    }
}
