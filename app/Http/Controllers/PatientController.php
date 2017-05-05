<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use file;
//use Auth;
use Illuminate\Support\Facades\Auth;
use App\User;
use Image;
use App\Doctor_Speciality;
use App\Booking;
use App\Userprofile;
use App\BookingDocuments;
use Illuminate\Support\Facades\Mail;
use App\Usersetting;
use Carbon\Carbon;



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

// public function profile(){

// $user = Auth::User()->id;
// print_r($user);
// die('kkkk');

// }

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

}
