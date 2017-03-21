<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\User;
use App\Medicalcenter;
use Auth;


class MedicalCenterController extends Controller
{
         public function index(){
            return view('medicalcenter.show_info_form');
         }

 public function insert(Request $request){


     $this->validate($request, [
         'medical_center_info' => 'required',
         'title' => 'required',
         'description' => 'required',
         'profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

     ]);
     $medical_info=Medicalcenter::Where('user_id','=',Auth::user()->id)->first();

     if($file = $request->hasFile('profilepic')) {
         $file = $request->file('profilepic') ;
         $fileName = $file->getClientOriginalName() ;
         $extention = $file->getClientOriginalExtension();
         $destinationPath = public_path().'/images/profile_pic/' ;
         $file->move($destinationPath,$fileName);

     }



     $medical_info->medical_center_info=$request['medical_center_info'];
     $medical_info->title=$request['title'];
     $medical_info->description=$request['description'];
     $medical_info->profilepic=$fileName;
     //  $profile->Auth::User();
     $medical_info->save();
     return redirect()->route('medical.center.contact.info.form')
         ->with('success', 'New Admin Regester successfully');

     //return $profile->profilepic;

 }

public  function show_contact_form(){
    return view('medicalcenter.show_contact_form');
}

      if($request['role']==2){
             $patient_center = new doctors;
             $patient_center->id = $adminnew->id;
              $patient_center->fname ='';
              $patient_center->lname ='';
              $patient_center->medical_center_id ='';
              $patient_center->specialization_id ='';
              $patient_center->status ='';
              

             $patient_center->save();
                  if(Auth::user()->role_id) {
             return redirect()->route('doctor.register.info.form')
                 ->with('success', 'New Admin Regester successfully');
                  }
          }

 }

