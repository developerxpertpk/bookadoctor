<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalcenters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('subscription_id')->unsigned()->default(0);
            $table->string('profilepic')->default('Anony.png');
            $table->string('medical_center_info');
            $table->string('title');
            $table->text('description');
//            contact info of medical center
            $table->string('medical_center_email');
            $table->string('web_url');
            $table->bigInteger('contact_no')->default(0000000000);
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->bigInteger('pincode');
            $table->string('working_hours');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscription')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicalcenters');
    }
}
