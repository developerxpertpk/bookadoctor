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
use Illuminate\Support\Facades\Mail;
use App\Usersetting;
use Carbon\Carbon;


class DoctorController extends Controller
{

public function index(){
    return view('doctor.drregistration');
}

public function insert(Request $request ){

$doctor = new Userprofile;
$doc = Userprofile::where('user_id','=',Auth::User()->id )->first();
$doc['contact_no']=$request['contactno'];
$doc['address']=$request['address'];
$doc['state']=$request['state'];
$doc['city']=$request['city'];
$doc['country']=$request['country'];
$doc['pincode']=$request['pincode'];
$doc->save();
return $this->profile();
}

 public function login(Request $request){

 	 if(Auth::check()){
 	 	
 	 	//die('hhhhh');
 	 	$details = speciality::all()->where('user_id','=',Auth::User()->id )->first();
 	 	 //print_r('user_id');
 	 	 
 		 // print_r(Auth::User()->id);	
 		 // print_r($details);
 		 // die('kkkkk');
 	 	
 	 	 return view('doctor.showInfo');  //,compact('details')
 
 	 	return redirect('/profile');
 	 }
  }

public function loginnew(){
  $user = Auth::User();
  $userr = $user->is_Profile;
 
 return view('doctor.profile', compact('user','userr'));

}

	
 public function profile(){
 
  $user = Auth::User();
  // echo"<pre>";
  // print_r(Auth::User());
  // die();


  $userr = $user->is_Profile;
  // echo "<pre>";
  // print_r($userr);
  // die('cdcdddccddcd');


	 return view ('doctor.profile', compact('userr'));
}


 public function update_profile(Request $request){

if($request->file('image')) {
                     $file = $request->file('image') ;
                     $fileName = $file->getClientOriginalName();
                     // echo "<pre>";
                     // print_r($fileName);
                     // die('sbsbsb');
                     $extention = $file->getClientOriginalExtension();
                     $destinationPath = public_path().'/images/profile_pic/' ;
                     $file->move($destinationPath,$fileName);
                    
                 }

 $user=Userprofile::Where('user_id','=',Auth::user()->id)->first();
 //$file = $request->hasFile('image');
 	 

 $user->images=$fileName;
 $user->save();
 // echo "<pre>";
 //                     print_r($fileName);
 //                     die('sbsbsb');
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
   // die();
    //$a = Booking::count()->where('doctor_id', '=' , Auth::User()->id);

    $count = Booking::where('doctor_id', '=' , Auth::User()->id)->count();
     // echo"<pre>";
     // print_r($count);
     // die('klklklklkl');
 

      return view('doctor.booking', compact('booking'));
   }

   public function bookingsProfile($id){

   $booking = Booking::find($id);

   // echo"<pre>";
   // print_r($booking);
   // die('hbhbfhbhheb');
   

    $k = $booking->documents;
     // echo"<pre>";
     // print_r($k);
     // die('klklk');

    $s = $booking->Appointment_timings;
     // echo"<pre>";
     // print_r($s);
     // die('klklk');

    $name = $booking->is_users->is_Profile->first_name;
    // print_r($name);
    // die('jkjkjkjkkj');
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
    $name = $book->is_users->is_Profile->first_name;
    $email = $book->is_users->email;
    // echo "<pre>";
    // print_r($email);
    // die('klklkkl');

   // $cancel = ['key' => 'Your Booking Has been canceled, Please Reschedule it.'];
    $variable = $book->medic_id;
    $var = $book->user_id;
    // echo "<pre>";
    // print_r($var);
    // die('kjkjkjkj');
    $a= $book->transaction;
     echo "<pre>";
    print_r($a);
    die('kjkjkjkj');
 
    
    $book->save();
   // $booking->

$userData = array();

        $userData['name'] = $name;
        $userData['email'] = $email;
        // $userData['password'] = $password;
        // $userData['seme_url'] = $url;


        Mail::send('emails.DoctorCancelbooking', $userData, function ($message) use ($userData) {
            $message->to($userData['email'])
                    ->subject('Bookings Cancel');
        });




        Mail::send('emails.DoctorRefundbooking', $userData, function ($message) use ($userData) {
            $message->to($userData['email'])
                    ->subject('Bookings Refund');
        });


 
 return redirect()->route('Doctor.booking');

}

 public function password(){

  return view('doctor.changepassword');
 }

//change password
    /*To Change Password of the current logged in  user*/
    public function resetpassword(Request $request){

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

                     return redirect()->route('doctor.profile')->with('success','Password Changed');

                    } else {

                       return redirect()->route('password.reset')->with('success','Password Does not match');
                    }

                } else {
                  return redirect()->route('password.reset')->with('success','Password Does not match');
                }
            }



            
    }
 public function dashboard(){

  $booking = Booking::all()->where('doctor_id', '=' , Auth::User()->id);

  $count = Booking::where('doctor_id', '=' , Auth::User()->id)->count();

  return view('doctor.dashboard.home' ,compact('count'));
 }

  public function manageschedule(){

    $user = Auth::User();
   
    $userr = $user->is_Profile;

    $u = $user->usersetting;
     $a = $user->id;



    // foreach($u as $key){
    //   $a = $key->day;
    //    echo"<pre>";
    // print_r($a);
    // die('mnmnmnmnmn');
    // }
   // die('jhhjh');


       return view('doctor.doctor-manage-schedule' , compact('userr','a','u'));
  }

  public function editschedule(Request $request){
     $user = Auth::User();

     $a = $user->id;
     // echo"<pre>";
     // print_r($a);
     // die('qwertyu');
   

     if($request['weekdays']!=NULL)
        {
            if(Usersetting::where('user_id' , '=',$request['user_id'] )->count()==0){
                $schedule = new Usersetting;
                $schedule->user_id=$request['user_id'];
                $schedule->day=implode(",", $request['weekdays']);
                $schedule->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $schedule->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $schedule->save();
                return  redirect(route('manage.scedule' ,compact('user','a')));
            }
            else {

                $val=Usersetting::where('user_id' , '=',$request['user_id'])->pluck('id');
                $sch=Usersetting::find($val);
                $sch->day=implode(",", $request['weekdays']);
                $sch->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $sch->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $sch->save();
                return  redirect(route('manage.scedule',compact('user','a')));


            }
     }


}
}