<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Doctor;

class DoctorController extends Controller
{
       

    public function index(){

    	return view('doctor.drregistration');
    }

    public function insert(Request $request ){

    	echo ($request['first_name']);
    	   
            $user = User::create([
                
                'email' => $request['email'],
                'password'=>bcrypt($request['password']),
                'role_id' => 2,
                ]);
            $doctor = Doctor::create([
                'fname' => $request['first_name'],
                'lname' => $request['last_name'],
                'medical_center_id'=> 1,
                'specialization_id' =>3,
                'status'=>'available',
                'user_id'=>1,

             ]);
            return redirect('/dr_login');
        }
        public function Showlogin(){


            return view('doctor.dr_login');
        }


         public function show_doctor_dashboard(){

          
                    return view('doctor.showInfo'); 
                 
         
         }


}
