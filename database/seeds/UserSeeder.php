<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user1= new App\User;
         $user1->role_id=2;
         $user1->email="prashant@gmail.com";
         $user1->password=bcrypt('123456');
         $user1->save();


         $user2= new App\User;
         $user2->role_id=2;
         $user2->email="susheel@gmail.com";
         $user2->password=bcrypt('123456');
         $user2->save();


         $user3= new App\User;
         $user3->role_id=2;
         $user3->email="sumit@gmail.com";
         $user3->password=bcrypt('123456');
         $user3->save();
    }
}
