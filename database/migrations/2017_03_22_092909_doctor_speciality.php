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
            $table->integer('doctors_id')->unsigned();
            $table->integer('speciality_id')->default(3);
            $table->foreign('speciality_id')->references('id')->on('speciality');
            $table->foreign('doctors_id')->references('id')->on('doctors');
          
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
