<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
//use App\Profile;
use App\Medicalcenter;
use App\Subscription;

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
                     $adminnew->save() ;




      $email=$request['email'];
    $password=$request['password'];

      if (Auth::attempt(array('email' => $email, 'password' => $password)))
      {


              if($request['role']==3){

                  $medical_center = new Medicalcenter;

                  $medical_center->user_id = $adminnew->id;
                  $medical_center->first_name = $request['first_name'];
                  $medical_center->last_name = $request['last_name'];
                  $medical_center->medical_center_info ='';
                  $medical_center->title ='';
                  $medical_center->description ='';
                  $sub_domain=$request['domain_name'].'.drbooking.com';
                  $medical_center->sub_domain_name =$sub_domain;
                  $medical_center->medical_center_email ='';
                  $medical_center->web_url ='';
                  $medical_center->contact_no =0;
                  $medical_center->address ='';
                  $medical_center->country ='';
                  $medical_center->state ='';
                  $medical_center->city ='';
                  $medical_center->pincode =0;
                  $medical_center->working_hours =0;

                  $medical_center->save();

                  $medical_subscription = new Subscription;
                  $medical_subscription->user_id = $adminnew->id;
                  $medical_subscription->save();



//                  if(Auth::user()->role_id) {
                      return redirect()->route('medical.center.subscription.form')
                          ->with('success', 'New Admin Regester successfully');
//                  }
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
