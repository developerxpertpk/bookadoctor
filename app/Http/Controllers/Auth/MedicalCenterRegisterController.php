<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Userprofile;


class MedicalCenterRegisterController extends Controller
{
  public function __construct(){
    //$this->middleware('guest:admin');
  }
  public function showMedicalRegistrationForm(){
    return View('medicalcenter.medical-center-register');
  }
  public function showPatientRegistrationForm(){
    return View('patient.patient-register');
  }
  public function login(Request $request){


  }
  public function register(Request $request)
{

    $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'password' => 'required',

    ]);


       $adminnew = new User;

       $adminnew->role_id = $request['role'];

       $adminnew->email = $request['email'];
       $adminnew->password = bcrypt($request['password']);
       $adminnew->status = 0;


                     $adminnew->save() ;




      $email=$request['email'];
    $password=$request['password'];

      if (Auth::attempt(array('email' => $email, 'password' => $password)))
      {


              if($request['role']==4){

                  $medical_center = new Userprofile;

                  $medical_center->user_id = $adminnew->id;
                  $medical_center->first_name = $request['first_name'];
                  $medical_center->last_name = $request['last_name'];
                  $sub_domain=$request['domain_name'].'.drbooking.com';
                  $medical_center->sub_domain =$sub_domain;

                  $medical_center->save();

//                  if(Auth::user()->role_id) {
                      return redirect()->route('medical.center.subscription.form')
                          ->with('success', 'New Admin Regester successfully');
//                  }
              }
          if($request['role']==2) {

          }


          }






//    $profile = new Profile;
//    $profile->user_id =$adminnew->id;
//    $profile->first_name ='';
//    $profile->last_name ='';
//    $profile->about ='';
//    $profile->save();
//
//    return redirect()->route('login')
//                   ->with('success','New Admin Regester successfully');


}

}
