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
         $this->call(DoctorTableSeeder::class);
        $this->call(speciality_table_seeder::class);
        $this->call(UserSeeder::class);
    }
}
