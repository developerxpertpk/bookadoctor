<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $speciality1= new App\Service;
        $speciality1->name="MRI";
        $speciality1->description="MRI";
        $speciality1->price=1000;
        $speciality1->save();

        $speciality2= new App\Service;
        $speciality2->name="CT-Scan";
        $speciality2->description="CT-Scan";
        $speciality2->price=2000;
        $speciality2->save();

        $speciality3= new App\Service;
        $speciality3->name="Baby Center";
        $speciality3->description="Baby center";
        $speciality3->price=1000;
        $speciality3->save();

        $speciality4= new App\Service;
        $speciality4->name="Emergency";
        $speciality4->description="Emergency";
        $speciality4->price=2500;
        $speciality4->save();




    }
}
