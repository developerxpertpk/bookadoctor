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
        $role= new App\Role;
        $role->role="admin";
        $role->save();

        $role2= new App\Role;
        $role2->role="user";
        $role2->save();

        $role3= new App\Role;
        $role3->role="doctor";
        $role3->save();

        $role4= new App\Role;
        $role4->role="medicalcenter";
        $role4->save();
    }
} 



