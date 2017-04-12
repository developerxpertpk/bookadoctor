<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicalCenterDoctor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalcenter_doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->integer('medicalcenter_id');
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->foreign('medicalcenter_id')->references('id')->on('users');
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
        Schema::dropIfExists('medicalcenter_doctor');
    }
}
