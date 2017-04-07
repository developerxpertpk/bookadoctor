<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $admin= new App\Admin;
        $admin->name="admin";
        $admin->email="admin@admin.com";
        $admin->username="admin12";
        $admin->password=bcrypt('admin12#');
        $admin->save();

        $this->call(RoleTableSeeder::class);

        $this->call(medicalcentersTableSeeder::class);
        $this->call(medicalcentersTableSeeder::class);
        $this->call(DoctorTableSeeder::class);
        $this->call(speciality_table_seeder::class);
        $this->call(UserSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(BookingSeeder::class);

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
