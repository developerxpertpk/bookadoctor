<?php

use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Booking1 = new App\Booking;
        $Booking1->doctor_id=1;
        $Booking1->user_id=1;
        $Booking1->medicalcenters_id=2;
        $Booking1->date_test=date("2017-04-04");
        $Booking1->status=1;
        $Booking1->problem="Eye Allergy";
        $Booking1->save();

        $Booking2 = new App\Booking;
        $Booking2->doctor_id=3;
        $Booking2->user_id=1;
        $Booking2->medicalcenters_id=2;
        $Booking2->date_test=date("2017-04-04");
        $Booking2->status=1;
        $Booking2->problem="Eye Infection";
        $Booking2->save();

        $Booking3 = new App\Booking;
        $Booking3->doctor_id=5;
        $Booking3->user_id=1;
        $Booking3->medicalcenters_id=2;
        $Booking3->date_test=date("2017-04-04");
        $Booking3->status=1;
        $Booking3->problem="Mottiaa";
        $Booking3->save();
    }
}

