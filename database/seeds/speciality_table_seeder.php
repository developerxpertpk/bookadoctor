<?php

use Illuminate\Database\Seeder;

class speciality_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $speciality1= new App\speciality;
         $speciality1->name="Psycologist";
         $speciality1->save();

         $speciality2= new App\speciality;
         $speciality2->name="Gynalogist";
         $speciality2->save();

         $speciality3= new App\speciality;
         $speciality3->name="Dermotologist";
         $speciality3->save();

         $speciality4= new App\speciality;
         $speciality4->name="Sexologist";
         $speciality4->save();

         $speciality5= new App\speciality;
         $speciality5->name="Dietition";
         $speciality5->save();

         $speciality6= new App\speciality;
         $speciality6->name="Ayurveda";
         $speciality6->save();


         $speciality7= new App\speciality;
         $speciality7->name="Homeopath";
         $speciality7->save();

    }
}
