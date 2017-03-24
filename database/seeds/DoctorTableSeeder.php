<?php

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Doctor1= new App\Doctor;
        $Doctor1->user_id="1";
        $Doctor1->medic_id="1";
        $Doctor1->status="1";
        $Doctor1->first_name="Prashant";
        $Doctor1->last_name="Singh";
        $Doctor1->save();

        $Doctor2= new App\Doctor;
        $Doctor2->user_id="2";
        $Doctor2->medic_id="2";
        $Doctor2->status="1";
        $Doctor2->first_name="Susheel";
        $Doctor2->last_name="Singh";
        $Doctor2->save();

        $Doctor3= new App\Doctor;
        $Doctor3->user_id="3";
        $Doctor3->medic_id="3";
        $Doctor3->status="1";
        $Doctor3->first_name="Sumit";
        $Doctor3->last_name="Singh";
        $Doctor3->save();
    }
}
