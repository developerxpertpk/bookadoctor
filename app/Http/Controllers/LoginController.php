<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function showMedicalLoginForm(){
    return View('auth.admin-login');
  }

  public function login(Request $request){
    //return true;

    //validate the form Database
    $this->validate($request, [
        'email'=>'required|email',
        'password'=>'required|min:6'
    ]);

    //Attempt to log the user in
    if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
//If successfull, then redirect to there intended locale_get_display_region
return redirect()->intended(route('admin.dashboard'));
    }
    // If unsuccessfull, then redirect to the login with the form data
   return redirect()->back()->withInput($request->only('email','remember'));

  }


    public function showMedicalDashboard(){
        return view('medicalcenter.dashboard.home');
    }

    public function showPatientDashboard(){
        return view('patient.home');
    }
    public function showDoctorDashboard(){
        return view('doctor.home');
    }


}
