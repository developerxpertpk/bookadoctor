<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use App\Http\Validators\HashValidator;
use Illuminate\Notifications\Notifiable;
use Validator;
use Hash;
use Illuminate\Http\Request;
use file;
use Auth;
use App\User;
use Image;
use App\Doctor_Speciality;
use App\Booking;
use App\Userprofile;
use App\BookingDocuments;


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

 	 if(Auth::check()){
 	 	
 	 	//die('hhhhh');
 	 	$details = speciality::all()->where('user_id','=',Auth::User()->id )->first();
 	 	 print_r('user_id');
 	 	 
 		 print_r(Auth::User()->id);	
 		 print_r($details);
 		 die('kkkkk');
 	 	
 	 	 return view('doctor.showInfo');  //,compact('details')
 
 	 	return redirect('/profile');
 	 }
  }

public function loginnew(){
  $user = Auth::User();
  $userr = $user->is_Profile;

 
 return view('doctor.profile', compact('userr'));

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

   // $user = Auth::user()->is_Profile;
   // //$a = Booking::all()->is_users;
   // echo "<pre>";
   // print_r($user);
   // die('sss');

   $booking = Booking::all()->where('doctor_id', '=' , Auth::User()->id);
   // echo "<pre>";
   // print_r($booking);
   // die('zxvbnm12345678');
    
      return view('doctor.booking', compact('booking'));
   }

   public function bookingsProfile($id){

   $booking = Booking::find($id);
   

    $k = $booking->documents;
     
     // foreach($k as $key){
     //  print_r($key->documents);
     // }
   
      //print_r($booking->is_users->is_Profile->last_name);
      return view('doctor.userprofile' , compact('booking','k'));
}

public function cancelbooking(Request $request,$id){

     $c = $request['cancels'];
    $reason = $request['reasoncancel'];
    $book = Booking::find($id);
    // echo "<pre>";
    // print_r($book);
    // die('jhjhjh');
    $book->cancel_reason=$reason;
    $book->status = $c;

    $cancel = ['key' => 'Your Booking Has been canceled, Please Reschedule it.'];
    $variable = $book->medic_id;
    $var = $book->user_id;

 
    $book->save();
 
 return redirect()->route('Doctor.booking');

}

 public function password(){

  return view('doctor.changepassword');
 }


// public function resetpassword(Request $request){

//      $oldpsw = $request['oldpassword'];
//      // echo "<pre>";
//      // print_r($oldpsw);
//      // die('klklk');
//      $newpsw = bcrypt($request['newpassword']);
//      $conpsw = bcrypt($request['conformpassword']);

//       //$psw = Auth::attempt(['password'=> $oldpsw]);
//       // echo Auth::User()->password;
//       //   echo $oldpsw;
//       //   die('Ice Cream');

// $validation = Validator::make(Auth::User()->all(), [

//     // Here's how our new validation rule is used.
//     'password' => 'hash:' . Auth::User()->password,
//     'newpassword' => 'required|different:password|confirmed'
//   ]);


//change password
    /*To Change Password of the current logged in  user*/
    public function resetpassword(Request $request){
 
        if(Auth::Check())
  {
    $request_data = $request->All();
    $validator = $this->admin_credential_rules($request_data);
    if($validator->fails())
    {
        return redirect()->route('password.reset')->with('success','Password Does not match');
    }
    else
    {  
      $current_password = Auth::User()->password;           
      if(Hash::check($request_data['old_password'], $current_password))
      {           
        $user_id = Auth::User()->id;
        // echo"<pre>";
        // print_r($user_id);
        // die('hjhjh');                    
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['new_password']);;
        $obj_user->save(); 
        return redirect()->route('doctor.profile')->with('success','Password Changed');
      }
      else
      {           
        $error = array('old_password' => 'Please enter correct current password');
        return redirect()->route('password.reset')->with('success','error');
      }
    }        
  }
  else
  {
    return redirect()->to('/');
  }    
       
    }


    public function admin_credential_rules(array $data)
{
  $messages = [
    'old_password.required' => 'Please enter current password',
    'new_password.required' => 'Please enter password',
  ];

  $validator = Validator::make($data, [
    'old_password' => 'required',
    'new_password' => 'required|same:password',
    'confirm_password' => 'required|same:password',     
  ], $messages);

  return $validator;
}


    

//change password end

//Notification of booking cancel



// public function toMail($cancel){
//    $url = url('/invoice/'.$this->cancel->id);

//     return (new MailMessage)
//                 ->greeting('Hello!')
//                 ->line('Your Booking has been Canceled!')
//                 ->action('View Reason', $url)
//                 ->line('Thank you for using our application!');

// }

//End of Notification of booking cancel





// if ($validation->fails()) {
//     return redirect()->back()->withErrors($validation->errors());
//   }

//   $newpsw->password = Hash::make(Request::input('newpassword'));
//   $newpsw->save();

//   return redirect()->back()
//     ->with('success-message', 'Your new password is now set!');
//   }


    // if (Hash::check($oldpsw, Auth::User()->password)){
    //      echo "yes";
    // }
    // else{
    //   echo "no";
    // }
      // if(Auth::User()->password == $oldpsw)
      // {
      //   echo "<pre>";
      //   echo Auth::User()->password;
      //   echo $oldpsw;
      //   die('Ice Cream'); 
      // }
}