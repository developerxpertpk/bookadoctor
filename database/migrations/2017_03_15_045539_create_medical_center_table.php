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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profilepic')->default('Anony.png');
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
            $table->timestamps();
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

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
