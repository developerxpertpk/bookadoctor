<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use file;
use App\User;
use Image;
use App\Doctor_Speciality;
use App\Booking;
use App\BookingTransaction;
use App\Userprofile;
use App\BookingDocuments;
use App\medicalcenter_doctor;
use Illuminate\Support\Facades\Mail;
use App\Usersetting;
use Carbon\Carbon;
use Auth;



class PatientController extends Controller
{
    public function insert(Request $request ){

 $user = new User;
 //$u = Auth::User();
// echo"<pre>";
// print_r($u);
// die('jhjhjh');

$user->email=$request['email'];
$user->password=bcrypt($request['password']);
$user->role_id=2;
$user->status=0;
// echo"<pre>";
// print_r($user['password']);
// die('jhjhjh');
$user->save();




// die('jhjhjh');
//return $this->profile($user->email , $user->password);
$email=$request['email'];
    $password=$request['password'];
 if (Auth::attempt(array('email' => $email, 'password' => $password)))
      {

//die('yes');
$pat = new Userprofile;
//$pat = Userprofile::where('user_id','=',Auth::User()->id )->first();
$pat->user_id=$user->id;
// echo"<pre>";
// print_r($pat['user_id']);
// die('lklklk');
$pat->first_name=$request['first_name'];
$pat['last_name']=$request['last_name'];
$pat['dob']=$request['dob'];
 // echo"<pre>";
 // print_r($request['dob']);
 // die('mnmnmn');
$pat['gender']=$request['gender'];
// echo"<pre>";
//  print_r($request['gender']);
//  die('mnmnmn');
$pat['contact_no']=$request['contactno'];
$pat['address']=$request['address'];
$pat['state']=$request['state'];
$pat['city']=$request['city'];
$pat['country']=$request['country'];
$pat['pincode']=$request['pincode'];
//$pat['images']=$request['profile'];
// echo"<pre>";
// print_r($pat['images']);
// die('lklklk');

$pat->save();

 return redirect()->route('patient.profile.login');
  }


}

public function user_login(){
// 	echo $email;
// echo $password;

//if(Auth::attempt(array('email' => $email, 'password' => $password))){
//	die('yes');
//}
//else{
 // die('no');
	return view('patient.profile');
//}

}
 public function update_profile(Request $request){
 // 	echo "<pre>";
 //   print_r($request)->images;
 // die('sbsbsb');
 // $user=Userprofile::Where('user_id','=',Auth::user()->id)->first(); 
  $a = Auth::User()->id;
  $s = Auth::User()->is_Profile->id;

//$u =new Userprofile::where('id','=',$s)->update($request->all());
// echo "<pre>";
// print_r($u);
// die('sbsbsb');
//print_r($request['pic']);
$user = User::find($a);
 //$u = Auth::User();
// echo"<pre>";
// print_r($u);
// die('jhjhjh');

$user->email=$request['email'];
// $user->password=$user->password;
// $user->role_id=2;
// $user->status=0;
// echo"<pre>";
// print_r($user['password']);
// die('jhjhjh');
$user->save();
// print_r($user->is_Profile);
// die('lklklklklklk');

$pat = Userprofile::find($user->id);
// echo"<pre>";
// print_r($pat);
// die('lklklk');
//$pat = Userprofile::where('user_id','=',Auth::User()->id )->first();
$pat->user_id=$user->id;
// echo"<pre>";
// print_r($pat->user_id);
// die('lklklk');
$pat->first_name=$request['first_name'];
$pat->last_name=$request['last_name'];
$pat->dob=$request['dob'];
 // echo"<pre>";
 // print_r($request['dob']);
 // die('mnmnmn');
$pat->gender=$request['gender'];
// echo"<pre>";
//  print_r($request['gender']);
//  die('mnmnmn');
$pat->contact_no=$request['contactno'];
$pat->address=$request['address'];
$pat->state=$request['state'];
$pat->city=$request['city'];
$pat->country=$request['country'];
$pat->pincode=$request['pincode'];
 //$pat->images=$request['pic'];
  $pat->save();

// echo"<pre>";
// print_r($pat['images']);
// die('lklklk');



//$pat['images']=$request['profile'];



// die('done');

  if($file = $request->hasFile('pic')) {
 
                     $file = $request->file('pic') ;
                     $fileName = $file->getClientOriginalName() ;
                     $extention = $file->getClientOriginalExtension();
                     $destinationPath = public_path().'/images/profile_pic/' ;
                     $file->move($destinationPath,$fileName);
                     $pat->images=$fileName;
                 }
 //die('no');

 //$pat=Userprofile::Where('user_id','=',Auth::user()->id)->first();
  
 //$file = $request->hasFile('image');



 	//$user=Userprofile::Where('user_id','=',Auth::user()->id)->first(); 

   

  $pat->save();

 
 return redirect(route('patient.profile.login'));
 
 }
 public function edit(){
   return view('patient.edit');
 }
 public function change_password(){
   return view('patient.changepassword');
 }

 public function password(Request $request){

if (Auth::check()) {
                $request_data = $request->All();
                $old_pwd = $request_data['old_password'];
                $new_pwd = $request_data['new_password'];
                $confirm_pwd = $request_data['password_confirmation'];
                $current_password = Auth::User()->password;

                if (Hash::check($old_pwd, $current_password)) {

                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);

                    if ($new_pwd == $confirm_pwd) {

                        $new_pwd = Hash::make($request_data['new_password']);
                        $obj_user->password = $new_pwd;
                        $obj_user->save();

                     return redirect()->route('patient.profile.login')->with('success','Password Changed');

                    } else {

                       return redirect()->route('patient.password')->with('success','Password Does not match');
                    }

                } else {
                  return redirect()->route('patient.password')->with('success','Password Does not match');
                }
            }


 }

  public function appointment(){

  
  return view('patient.appointment');
 }
 public function city(Request $request)
    {

      $term=$request->term;
      $data=Userprofile::where('city','LIKE','%'.$term.'%')->select('city')->distinct()->get();
     // $data=loc::where('city','LIKE','%'.$term.'%')->get();
      //dd($data);
      $results=array();
      foreach ($data as $key => $v) {
          //if($v->getUser->role_id == 4)
          //{
          $results[]=['value'=>$v->city];
          //}

      }


      return response()->json($results);

    }
    public function medicalcenter(Request $request)
    {
      $term=$request->term;
      $data=Userprofile::where('title','LIKE','%'.$term.'%')->select('title')->distinct()->get();
     // $data=loc::where('city','LIKE','%'.$term.'%')->get();
      //dd($data);

      $results=array();
      foreach ($data as $key => $v) {
        //if($v->getUser->role_id == 4)
        //{
          $results[]=['value'=>$v->title];
        //}

      }

      return response()->json($results);

    }
    public function disease(Request $request)
    {
      $term=$request->term;
      $data=Booking::where('reason','LIKE','%'.$term.'%')->select('reason')->distinct()->get();
     // $data=loc::where('city','LIKE','%'.$term.'%')->get();
      //dd($data);

      $results=array();
      foreach ($data as $key => $v) {
        //if($v->getUser->role_id == 4)
        //{
          $results[]=['value'=>$v->reason];
        //}

      }

      return response()->json($results);

    }
    public function state(Request $request)
    {
      $term=$request->term;
      $data=Userprofile::where('state','LIKE','%'.$term.'%')->select('state')->distinct()->get();
     // $data=loc::where('city','LIKE','%'.$term.'%')->get();
      //dd($data);

      $results=array();
      foreach ($data as $key => $v) {
        //if($v->getUser->role_id == 4)
        //{
          $results[]=['value'=>$v->state];
        //}

      }

      return response()->json($results);

    }
    public function country(Request $request)
    {
      $term=$request->term;
      $data=Userprofile::where('country','LIKE','%'.$term.'%')->distinct()->get();
     // $data=loc::where('city','LIKE','%'.$term.'%')->get();
      //dd($data);

      $results=array();
      foreach ($data as $key => $v) {
          if($v->getUser->role_id == 4){
          $results[]=['value'=>$v->country];
        }

      }

      return response()->json($results);

    }
//Prakhar
    public function citymedic(Request $request)
    {
      $city= $request['searchText'];
      $medical=Userprofile::where('city','=',$city)->distinct()->get();
      $results=array();
      foreach ($medical as $key => $v) {
          if($v->getUser->role_id == 4){
          $results[]=['value'=>$v->title];
        }

      }


      return response()->json($results);
    }
    public function citymedicprof(Request $request)
    {
      $city= $request['searchText'];
      $medical=Userprofile::where('city','=',$city)->distinct()->get();
      $results=array();
      foreach ($medical as $key => $v) {
          if($v->getUser->role_id == 4){
            foreach ($v->Servicepiv as $key) {
              $special[]=$key->name;
            }
          $results[]=['title'=>$v->title,'medic_info'=>$v->title,'address'=>$v->address,'city'=>$v->city,'state'=>$v->state,'country'=>$v->country,'speciality'=>$special,'pic'=>$v->images,'pincode'=>$v->pincode,'id'=>$v->user_id];
          $special="";
        }
      }
      return response()->json($results);
    }
    public function citymedicprofile($id)
    {
      $medicalprofile=Userprofile::find($id);
      $doctors=medicalcenter_doctor::where('medicalcenter_id','=',$id)->paginate(5);
      // echo "<pre>";
      // foreach ($medicalprofile->Servicepiv as $key) 
      // {
      //   print_r($key->name);
      //   echo "</br>";
      // }

      return view('MedicalCenter',compact('medicalprofile','doctors'));

    }
    public function namemedicfilter(Request $request)
    {
       $city= $request['searchcity'];
       $medicname = $request['searchText'];
      $medical=Userprofile::where('city','=',$city)->where('title','=',$medicname)->distinct()->get();
      $results=array();
      foreach ($medical as $key => $v) {
          if($v->getUser->role_id == 4){
            foreach ($v->Servicepiv as $key) {
              $special[]=$key->name;
            }
          $results[]=['title'=>$v->title,'medic_info'=>$v->title,'address'=>$v->address,'city'=>$v->city,'state'=>$v->state,'country'=>$v->country,'speciality'=>$special,'pic'=>$v->images,'pincode'=>$v->pincode,'id'=>$v->user_id];
          $special="";
        }
      }
      return response()->json($results);
    }
    public function booking(Request $request)
    {
      dd($request->medical_id);
      die($request);
    }
    public function time(Request $request)
    {
      $date= $request->searchText;
      $date=date('l', strtotime( $date));
      $medical=Usersetting::where('user_id','=',$request['docid'])->where('day','=',$date)->distinct()->get();
      //dd($date);
      $bookings=Booking::where('doctor_id','=',$request['docid'])->where('medic_id','=',$request['medicid'])->where('Appointment_timings','>',$request->searchText." "."09:00:00")->where('Appointment_timings','<',$request->searchText." "."20:00:00")->distinct()->get();
      foreach ($bookings as $key => $value) {

        $result2[$key] = $value->Appointment_timings;
      }
      foreach ($medical as $key) {
      $start=strtotime($key->time_in);
      $end=strtotime($key->time_out);
      $i=0;
      while($start<$end)
      {
        $result[$i]="$start";
        $start=strtotime('+30 minutes', $start);
          $i++;
      }
            // dd($result);
            }
      foreach ($result as $key => $value) {
        $result[$key]= $request->searchText." ".date("H:i:s",$value);
      }
          //  dd($result);
      if(!empty($result2) && isset($result))
      {
      $result = array_diff($result, $result2);
      return response()->json($result);
    }
    elseif (empty($result2) && !isset($result)) {
      return response()->json('hahahah');
    }
    else{
      //$result = array_diff($result, $result2);
      return response()->json($result);
    }

      //return response()->json($result);
    }
    public function creatbooking(Request $request, $id)
    {
      // print_r($id);
      // print_r(Auth::user()->id);
      // print_r($request['reason']);
      // print_r($request['datepicker23']);
      // print_r($request['time12']);
      $pieces = explode("-", $request['reason']);
      //dd($request);
      $booking = new Booking;
      $booking->doctor_id=$request['doc-id'];
      $booking->user_id=Auth::user()->id;
      $booking->medic_id=$id;
      $booking->speciality_id='3';
      $booking->reason=$pieces[0];
      $booking->Appointment_timings=$request['time12'];
      $booking->payment_status='0';
      $booking->status='0';
      $booking->save();
      $pieces=$pieces[1];
      // dd($request);
      // die();
      \Stripe\Stripe::setApiKey("sk_test_dimU5va1HHMCgvtrz76xiO4L");
  $charges=\Stripe\Charge::all(array('limit' => 50));
  $charge=$charges->data;
      return view('bookingdone',compact('booking','pieces','charge'));
    }
    public function stripeinsert(Request $request)
    {
      // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_dimU5va1HHMCgvtrz76xiO4L");
// Token is created using Stripe.js or Checkout!
// Get the payment token submitted by the form:
$token = $_POST['stripeToken'];
// Charge the user's card:
$charge = \Stripe\Charge::create(array(
"amount" => $request->cost.'00',
"currency" => "inr",
"description" => "Booking Charges",
"source" => $token,
));
// echo "<pre>";
// print_r($charge->source->object);
// die();
// dd($charge);
$booking = Booking::find($request['id']);
$booking->payment_status=1;
$booking->save;
$bookingtrans = new BookingTransaction;
$bookingtrans->booking_id=$request['id'];
$bookingtrans->amount=$charge->amount;
$bookingtrans->transaction_id=$charge->id;
$bookingtrans->transaction_mode=$charge->source->brand." ".$charge->source->object;
$bookingtrans->status=1;
$bookingtrans->save();
//$details=\Stripe\Balance::retrieve();
// foreach ($details as $key) {
//  dd($key->amount);
// }
//dd($details);
// foreach ($charges as $key) {
// print_r($key);$charges=\Stripe\Charge::all(array('limit' => 50));
// die();
// }
// echo "<pre>";
    // print_r($charges->_values);
    // die();
    // dd($charges->_values);
    return redirect()->route('patient.profile.login');
    }
  public function afterbooking($id)
  {

  } 

// public function profile(){

// $user = Auth::User()->id;
// print_r($user);
// die('kkkk');

// }


}
