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
        $Doctor1->user_id="0";
        $Doctor1->medic_id="1";
        $Doctor1->specilization_id="1";
        $Doctor1->status="1";
        $Doctor1->fname="Prashant";
        $Doctor1->lname="Singh";
        $Doctor1->save();

        $Doctor2= new App\Doctor;
        $Doctor2->user_id="0";
        $Doctor2->medic_id="1";
        $Doctor2->specilization_id="1";
        $Doctor2->status="1";
        $Doctor2->fname="Susheel";
        $Doctor2->lname="Singh";
        $Doctor2->save();

        $Doctor3= new App\Doctor;
        $Doctor3->user_id="0";
        $Doctor3->medic_id="2";
        $Doctor3->specilization_id="1";
        $Doctor3->status="1";
        $Doctor3->fname="Sumit";
        $Doctor3->lname="Singh";
        $Doctor3->save();
    }
}
