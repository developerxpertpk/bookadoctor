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


            $table->increments('id');
            $table->integer('booking_id');
            $table->string('documents');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings');
           
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
