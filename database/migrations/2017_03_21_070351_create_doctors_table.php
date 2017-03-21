<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('medic_id');
            $table->integer('specilization_id');
            $table->integer('status');
            $table->string('fname');
            $table->string('lname');
            $table->timestamps();
            $table->foreign('medic_id')->references('id')->on('medicalcenters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
