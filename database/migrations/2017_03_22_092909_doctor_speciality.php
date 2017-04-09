<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DoctorSpeciality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_speciality', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('speciality_id');
            $table->timestamps();
            $table->foreign('speciality_id')->references('id')->on('speciality');
            $table->foreign('user_id')->references('id')->on('users');
          
    });


    }


    /**
     * Reverse the migrations.
     *m
     * @return void
     */
    public function down()
    {
         
            Schema::dropIfExists('doctor_speciality');
    }
    
}
