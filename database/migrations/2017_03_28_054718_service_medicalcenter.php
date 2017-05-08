<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceMedicalcenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalcenter_service', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('medicalcenter_id')->unsigned()->index();
            $table->integer('service_id')->unsigned()->index();
            $table->timestamps();
           // $table->foreign('medicalcenter_id')->references('id')->on('medicalcenters');
           // $table->foreign('service_id')->references('id')->on('services');
            $table->unique(array('medicalcenter_id', 'service_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicalcenter_service');
    }
}
