<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
           $table->increments('id');
            $table->string('name');
<<<<<<< HEAD
            $table->string('ammount');
            $table->string('status')->comment('Active = Activated plans, Deactive =Deactivated plans')->default('Active');

=======
            $table->string('amount');
>>>>>>> 3463c348bd43d998881ba69743ada06524770be9
            $table->text('description');
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
        Schema::dropIfExists('plans');
    }
}
