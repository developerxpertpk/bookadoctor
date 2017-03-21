<?php

use Illuminate\Database\Seeder;

class medicalcentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$Medical1= new App\MedicalCenter;
        $Medical1->medical_center_info="Medical-1";
        $Medical1->title="PGP";
        $Medical1->description="Something Something";
        $Medical1->medical_center_email="medic1@gmail.com";
        $Medical1->contact_no="9495969899";
        $Medical1->address="Somethig,Somethig,Somethig";
        $Medical1->country="India";
        $Medical1->state="Punjab";
        $Medical1->city="Mohali";
        $Medical1->pincode="140306";
        $Medical1->working_hours="06:00 to 12:00";
        $Medical1->web_url="PGP.in";
        $Medical1->save();

        $Medical2= new App\MedicalCenter;
        $Medical2->medical_center_info="Medical-2";
        $Medical2->title="PGC";
        $Medical2->description="Something Something";
        $Medical2->medical_center_email="medic2@gmail.com";
        $Medical2->contact_no="9495969899";
        $Medical2->address="Somethig,Somethig,Somethig";
        $Medical2->country="India";
        $Medical2->state="Punjab";
        $Medical2->city="Mohali";
        $Medical2->pincode="140306";
        $Medical2->working_hours="06:00 to 12:00";
        $Medical2->web_url="PGC.in";
        $Medical2->save();
    }
}
