<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Speciality extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('specialities',function(Blueprint $table){
	$table->engine = 'InnoDB';
	$table->increments('id')->unsigned();
	$table->integer('user_id')->comment('medical center id')->unsigned()->index();
	$table->string('name');
	$table->string('price');
	$table->timestamps();

	//$table->foreign('user_id')->references('id')->on('users');

});

// Schema::rename($specialization , $speciality);
}
/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::dropIfExists('specialities');
}
}