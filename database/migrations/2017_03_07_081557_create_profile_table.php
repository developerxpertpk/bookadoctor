<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('role_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profilepic')->default('Anony.png');
            $table->integer('age')->nullable();

//            medical center column
            $table->integer('subscription_id')->unsigned()->default(0);
            $table->string('medical_center_info');
            $table->string('title');
            $table->text('description');
            $table->text('sub_domain_name')->nullable();

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
            $table->enum('status',['Active', 'Inactive'])->default('Inactive');
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');



            $table->timestamps();
//            $table->foreign('user_id')->refrence('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
