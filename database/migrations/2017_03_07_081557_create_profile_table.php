<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
             

//            contact info of medical center
            
           
    /**
    ye kya hai??? ye pankaj sir ne pehle se create kiya hua tha comment kr k dekho to ess ko

     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {


    $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->bigInteger('contact_no')->default(0000000000);
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('medical_center_info')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('medical_center_email')->nullable();
            $table->string('web_url')->nullable();
            $table->bigInteger('pincode')->nullable();
            $table->string('images')->default('Anony.png');

            
            
             //medical center column
           
            $table->text('sub_domain')->nullable();
            $table->integer('plan_id')->nullable();
            $table->integer('plan_payment_status')->default(0)->comment("0=pending","1=complete");
            $table->timestamps();

            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plan_id')->references('id')->on('plans');
//          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userprofiles');
    }
}
