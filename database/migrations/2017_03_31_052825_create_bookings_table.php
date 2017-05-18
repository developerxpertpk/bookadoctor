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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('medic_id')->unsigned()->index();
            $table->integer('speciality_id')->unsigned()->index();
            $table->text('cancel_reason');
            $table->text('reschedule_reason');
            $table->datetime('Appointment_timings')->nullable();
            $table->text('reason');
            $table->boolean('payment_status')->comment('0=pending, 1=complete');
            $table->string('status')->comment('0=pending, 1=complete, 2=cancel, 3=reshedule');
            $table->timestamps();
            
            
          //  $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('speciality_id')->references('id')->on('speciality');

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
