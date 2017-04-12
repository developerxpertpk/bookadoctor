<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->integer('medic_id');
            $table->integer('user_id');
            $table->integer('medic_id');
            $table->integer('speciality_id');
            $table->text('cancel reason');
            $table->text('reschedule reason');
            $table->datetime('Appoitment_timings')->nullable();
            $table->text('reason');
            $table->string('documents');
            $table->boolean('payment_status')->comment("0=pending","1=complete");
            $table->string('status')->comment('0=pending',"1=complete","2=cancel","3=reshedule");
            $table->timestamps();
            
            
            $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('speciality_id')->references('id')->on('speciality');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
