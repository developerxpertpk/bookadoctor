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
Schema::create('speciality',function( Blueprint $table){
$table->increments('id');
$table->string('name');
$table->rememberToken();
$table->timestamps();

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
Schema::dropIfExists('speciality');
Schema::dropIfExists('specialization');
}
}