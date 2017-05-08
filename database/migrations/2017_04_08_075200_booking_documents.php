<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookingDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingdocuments', function (Blueprint $table){

            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('booking_id')->unsigned()->index();
            $table->string('documents');
            $table->timestamps();

          //  $table->foreign('booking_id')->references('id')->on('bookings');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('bookingdocuments');
    }
}
