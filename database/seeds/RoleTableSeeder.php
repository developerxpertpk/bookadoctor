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
        $role1= new App\Role;
        $role1->role="users";
        $role1->save();

        

        $role2= new App\Role;
        $role2->role="doctor";
        $role2->save();

        $role3= new App\Role;
        $role3->role="medicalcenter";
        $role3->save();
    }
} 
//hang dhk liya   kk hai?

