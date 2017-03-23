-><?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('medic_id');
            $table->integer('specilization_id')->default(1);
            $table->integer('speciality_id')->default(3);
            $table->string('status');
            $table->string('fname');
            $table->string('lname');
            $table->timestamps();
            $table->foreign('medic_id')->references('id')->on('medicalcenters');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('specilization_id')->references('id')->on('medicalcenterspecilazition');
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
        Schema::dropIfExists('doctors');
    }
}
