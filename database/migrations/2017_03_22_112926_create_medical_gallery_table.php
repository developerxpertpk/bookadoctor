<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalcenterimages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_center_id')->unsigned()->default(0);
            $table->string('images')->default('Anony.png');
            $table->foreign('medical_center_id')->references('id')->on('medicalcenters');
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
        Schema::dropIfExists('medicalcenterimages');
    }
}
