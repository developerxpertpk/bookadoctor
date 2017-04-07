<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\User;
use App\Medicalcenter;
use App\Subscription;
Use App\Plan;
use Auth;


class MedicalCenterController extends Controller
{
         public function index(){
          $plan_info=Plan::all();
//             echo "<pre>";
//             print_r($plan_info);
//             die('llop');

            return view('medicalcenter.medical-center-subscription',compact('plan_info'));
         }
         public function show_info_form(){
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
                 return redirect()->route('medical.center.image.gallery')
                     ->with('success', 'New Admin Regester successfully');

                 //return $profile->profilepic;

             }
             public function contact_insert(Request $request){
                 $this->validate($request, [
                     'medical_center_email' => 'required',
                     'web_url' => 'required',
                     'contact_no' => 'required',
                     'address' => 'required',
                     'country' => 'required',
                     'state' => 'required',
                     'city' => 'required',
                     'pincode' => 'required',
                     'working_hours' => 'required',

                 ]);
                 $medical_contact=Medicalcenter::Where('user_id','=',Auth::user()->id)->first();

                 $medical_contact->medical_center_email=$request['medical_center_email'];
                 $medical_contact->web_url=$request['web_url'];
                 $medical_contact->contact_no=$request['contact_no'];
                 $medical_contact->address=$request['address'];
                 $medical_contact->country=$request['country'];
                 $medical_contact->state=$request['state'];
                 $medical_contact->city=$request['city'];
                 $medical_contact->pincode=$request['pincode'];
                 $medical_contact->working_hours=$request['working_hours'];

                 $medical_contact->save();
                 return redirect()->route('medical.center.image.gallery')
                     ->with('success', 'New Admin Regester successfully');

             }

            public  function show_contact_form(){
                return view('medicalcenter.show_contact_form');
            }
            public  function payment_success(Request $request){
                echo "<pre>";



                $medical_subscription=Subscription::Where('user_id','=',Auth::user()->id)->first();
                $medical_subscription->plan_type = $request['plan_type'];
                $medical_subscription->plan_amount = $request['plan_amount'];
                $medical_subscription->status = $request['plan_status'];
                $medical_subscription->save();

                return redirect()->route('medical.center.dashboard');

            }

            public function getProfile(){
                return view('medicalcenter.profile');
            }
            public function imageUpload(){
                return view('medicalcenter.image-upload');
            }


 }




