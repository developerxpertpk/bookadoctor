<?php

namespace App\Http\Controllers;

use App\Userprofile;
use Illuminate\Http\Request;
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
                    // 'profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                 ]);



                 $medical_info=Userprofile::Where('user_id','=',Auth::user()->id)->first();

                 if($file = $request->hasFile('profilepic')) {
                     $file = $request->file('profilepic') ;
                     $fileName = $file->getClientOriginalName() ;
                     $extention = $file->getClientOriginalExtension();
                     $destinationPath = public_path().'/images/profile_pic/' ;
                     $file->move($destinationPath,$fileName);
                    $medical_info->images=$fileName;
                 }



                 $medical_info->medical_center_info=$request['medical_center_info'];
                 $medical_info->title=$request['title'];
                 $medical_info->description=$request['description'];
                
                 $medical_info->save();

                 return redirect()->route('medical.center.image.gallery');

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

                 ]);
                 $medical_contact=Userprofile::Where('user_id','=',Auth::user()->id)->first();

                 $medical_contact->medical_center_email=$request['medical_center_email'];
                 $medical_contact->web_url=$request['web_url'];
                 $medical_contact->contact_no=$request['contact_no'];
                 $medical_contact->pincode=$request['pincode'];
                 $medical_contact->address=$request['address'];
                 $medical_contact->country=$request['country'];
                 $medical_contact->state=$request['state'];
                 $medical_contact->city=$request['city'];

                 $medical_contact->save();
                 return redirect()->route('medical.center.image.gallery');

             }

            public  function show_contact_form(){
                $contact_info=Userprofile::Where('user_id','=',Auth::user()->id)->first();
               // echo "<pre>";
               //  print_r($contact_info);
               //  die('info');
                return view('medicalcenter.show_contact_form',compact('contact_info'));
            }
            public  function payment_success(Request $request){

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_xJ0emzIKBRpb5CiOFSNcEaSq");

// Token is created using Stripe.js or Checkout!
// Get the payment token submitted by the form:
$token = $_POST['stripeToken'];

// Charge the user's card:
//print_r($request['plan_amount']);
//die();
$charge = \Stripe\Charge::create(array(
  "amount" => $request['plan_amount'],
  "currency" => "usd",
  "description" => "Example charge",
  "source" => $token,
));





                $medical_subscription=Userprofile::Where('user_id','=',Auth::user()->id)->first();
                $medical_subscription->plan_id = $request['new_plan_id'];
                $medical_subscription->plan_payment_status = $request['plan_status'];
                $medical_subscription->save();

                return redirect()->route('medical.center.dashboard');

            }

            public function getProfile(){
                return view('medicalcenter.profile');
            }
            public function imageUpload(){
                return view('medicalcenter.image-upload');
            }
            public function show_medical_subscription_detail()
            {
                $plan_dta= Userprofile::where('user_id','=',Auth::user()->id)->first();
                $plan_id=$plan_dta->plan_id;
               $plan_detail=Plan::where('id','=',$plan_id)->first();
               return view('medicalcenter.plan-subscription-detail',compact('plan_detail','plan_dta'));

            }


}




