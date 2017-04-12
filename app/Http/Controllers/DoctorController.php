<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Http\Request;
use file;
use Auth;
use App\User;
use Image;
use App\Doctor_Speciality;
use App\Booking;
use App\Userprofile;


class DoctorController extends Controller
{

public function index(){
    return view('doctor.drregistration');
}

public function insert(Request $request ){
	

    // echo ($request['first_name']);
$user = new User;
	$user->email=$request['email'];
	$user->password=bcrypt($request['password']);
	$user->role_id=3;
	$user->status=1;
	$user->save();
$doctor = new Userprofile;
	$doctor->first_name=$request['first_name'];
	$doctor->last_name=$request['last_name'];
	$doctor->user_id=$user->id;
	$doctor->save();
		
	//$doctor->profile_pic=$fileName;
    // return view('doctor.show_profile');
	//Pivot table
	// foreach($request->speciality as $key)
	// {
	// $speciality = new  Doctor_Speciality;
	// 	$speciality->speciality_id=$key;
	// 	$speciality->doctors_id=$doctor->id;
	// 	$speciality->save();
	// }


return view('doctor.dr_login');
}


//  public function update(Request $request){

//  		$user  = new User;
//  		$doctor = new Doctor;
// 		$doctor->user_id=$user->id;
// 	    //print_r($doctor);
// 		//die('aaaaa');
// 		 return redirect ('doctor.show_profile');
// 	}

//  	// if($file = $request->hasFile('profile_pic1')) {
//   //        $file = $request->file('profile_pic1') ;
//   //        $fileName = $file->getClientOriginalName() ;
//   //        $extention = $file->getClientOriginalExtension();
//   //        $destinationPath = public_path().'/images/profile_pic/' ;
//   //        $file->move($destinationPath,$fileName);
 public function Showlogin()
 {
  
  	return  view('doctor.dr_login');

  }

 public function login(Request $request){
 
 	 $email = $request['email'];
 	 $password = $request ['password'];
	 Auth::attempt(['email'=> $request['email'],'password'=> $request ['password']]);


 	 // if(Auth::check()){
 	 	
 	 // 	//die('hhhhh');
 	 // 	$details = speciality::all()->where('user_id','=',Auth::User()->id )->first();
 	 	 //print_r('user_id');
 	 	 
 		 //print_r(Auth::User()->id);	
 		 // print_r($details);
 		 //die('kkkkk');
 	 	
 	 	 //return view('doctor.showInfo');  //,compact('details')
 
 	 	return redirect('/profile');
 	 }


	
 public function profile(){
 
  $user = Auth::User();
  // print_r(Auth::User());
  // die();


  $userr = $user->is_Profile;
  // echo "<pre>";
  // print_r($userr);
  // die('cdcdddccddcd');


	 return view ('doctor.profile', compact('userr'));
}


 public function update_profile(Request $request){

 $user=Userprofile::Where('user_id','=',Auth::user()->id)->first();
 	
 	 if($file = $request->hasFile('image')) {
                     $file = $request->file('image') ;
                     $fileName = $file->getClientOriginalName() ;
                     // echo "<pre>";
                     // print_r($fileName);
                     // die('sbsbsb');
                     $extention = $file->getClientOriginalExtension();
                     $destinationPath = public_path().'/images/profile_pic/' ;
                     $file->move($destinationPath,$fileName);

                 }


 	$user->images=$fileName;
 	$user->save();
 	return $this->profile();
 

 	 

 }

   public function viewBookings(){

   //$user = Auth::user()->bookings;

   $booking = Booking::all()->where('doctor_id', '=' , Auth::User()->id);
 
      return view('doctor.booking', compact('booking'));
   }

   public function bookingsProfile($id){
   $booking = Booking::find($id);
      //print_r($booking->is_users->is_Profile->last_name);
      return view('doctor.userprofile' , compact('booking'));
}
 
 public function password(){

  return view('doctor.changepassword');

 }


public function resetpassword(Request $request){

     $oldpsw = bcrypt($request['oldpassword']);
     $newpsw = bcrypt($request['newpassword']);
     $conpsw = bcrypt($request['conformpassword']);

      $psw = Auth::attempt(['password'=> $oldpsw]);
      // echo Auth::User()->password;
      //   echo $oldpsw;
      //   die('Ice Cream');



    if (Hash::check($old_pwd, $current_password))
      // if(Auth::User()->password == $oldpsw)
      // {
      //   echo "<pre>";
      //   echo Auth::User()->password;
      //   echo $oldpsw;
      //   die('Ice Cream'); 
      // }
        
        die('hjhjhjhj');
   
}

}