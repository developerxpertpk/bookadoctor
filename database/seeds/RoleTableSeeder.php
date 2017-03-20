<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient= new App\Role;
        $patient->role="patient";
        $patient->description="Patient Role";
        $patient->save();

        $doctor= new App\Role;
        $doctor->role="doctor";
        $doctor->description="Doctor Role";
        $doctor->save();

        $medical_center= new App\Role;
        $medical_center->role="medicalcenter";
        $medical_center->description="Medical Center Role";
        $medical_center->save();
    }
}
