<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use File;
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
use App\BookingTransaction;




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

  public function appointment(){

  
  return view('patient.appointment');
 }
 
      public function userhistory(){

       $a = Auth::User()->id;
       // print_r($a);
       // die('klklk');
       $b = Booking::where('user_id' , '=', $a)->distinct()->get();
       //$c = $b->doctor_id;
       // print_r($b);
       // die('klklk');

       foreach($b as $key){

       
        //Patient
        // $key['doctor_fname'] = $key->is_users->is_profile->first_name;
        // $key['doctor_lname'] = $key->is_users->is_profile->last_name;
        // print_r($c);
        // die('die');
       }

          //die('again');
         return view('patient.appointment-history',compact('b'));
       }
       


// public function profile(){

// $user = Auth::User()->id;
// print_r($user);
// die('kkkk');

// }
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
    $doctor_id =$request['did'];
    $did = User::where('id','=',$doctor_id)->first()->email;
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
    // print_r($a);
    // die('kjkjkjkj');
 
    $book->save();
   // $booking->

$userData = array();

        $userData['name'] = $name;
        $userData['email'] = $email;
        $userData['doc_email']=$did;
       //  
       
      
        // $userData['password'] = $password;
        // $userData['seme_url'] = $url;

 Mail::send('emails.PatientCancelbooking',  $userData, function ($message) use ( $userData) {
            $message->to($userData['doc_email'])
                    ->subject('Bookings Cancel');
        });

        Mail::send('emails.PatientCancelbooking', $userData, function ($message) use ($userData) {
            $message->to($userData['email'])
                    ->subject('Bookings Cancel');
        });




        Mail::send('emails.DoctorRefundbooking', $userData, function ($message) use ($userData) {
            $message->to($userData['email'])
                    ->subject('Bookings Refund');
        });

            return redirect()->route('user.appointment.history');

}

public function reschedulebooking(Request $request,$id){

   // $booking = Booking::find($id)->first();

    // echo "<pre>";
    $r = $request['reschedules'];
   

    $reason = $request['reschedule'];
    $book = Booking::find($id);
    $book->reschedule_reason=$reason;
    $book->status = $r;
    $name = $book->is_users->is_Profile->first_name;
    $email = $book->is_users->email;
     $doctor_id =$request['did'];
    $did = User::where('id','=',$doctor_id)->first()->email;

$userData = array();

        $userData['name'] = $name;
        $userData['email'] = $email;
          $userData['doc_email']=$did;
        // $userData['password'] = $password;
        // $userData['seme_url'] = $url;

        Mail::send('emails.Patientreschedulebooking',  $userData, function ($message) use ( $userData) {
            $message->to($userData['doc_email'])
                    ->subject('Bookings Cancel');
        });


        Mail::send('emails.Patientreschedulesbooking', $userData, function ($message) use ($userData) {
            $message->to($userData['email'])
                    ->subject('Bookings Reschedule');
        });


    $book->save();
 return redirect()->route('user.appointment.history');
 
}
public function showbooking($id){
 //print_r($id);
  // $a = Auth::User()->id;
   $key = Booking::where('id' , '=', $id)->first();

  //print_r($key);
   
   //die('kjkjkjk');
 
   $booling_docs= BookingDocuments::where('booking_id','=',$key->id)->get();
   $payment_transction_deatils=BookingTransaction::where('booking_id','=',$key->id)->get();

  
 //    foreach($key as $v){
     
 //    print_r($v->status);
   
 //   die('kjkjkjk');
 // }


 //   foreach($b as $key){

 //    $Dr = Userprofile::where('user_id','=',$key->doctor_id)->first()->gender;
    // print_r($key);
    // die('hjhjhjh');
 // }
 // die('mmmmm');

   return view('patient.showbookings',compact('key','booling_docs','payment_transction_deatils'));
}
public function add_patient_document($id){
 

   $booking_id=$id;
        $booking = Booking::find($booking_id);
        // echo "<pre>";
        // print_r($booking);
        // die('lklklkllkk');

   return view('patient.add-documents',compact('booking'));

}
public function add_patient_document_submit(Request $request)
    {
        $files = $request->file('docimages') ;
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
            $rules = array('file' => 'mimes:png,jpeg|required'); 
            //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);
            if($validator->passes()){
                $destinationPath = public_path().'/images/documents/' ;
                $fileName = rand(5,8).$file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $fileName);
                $uploadcount ++;

            }
            $dooking_id = $request['booking_id'];
                $gallery = new BookingDocuments;
                $gallery->booking_id=$dooking_id;
                $gallery->documents=$fileName;
                $gallery->save();
          
          
        }


        return $this->showbooking($dooking_id);


    }

 public function destroyDoc($id,$del)
    {

        $news = BookingDocuments::findOrFail($id);
        $image_path = app_path("images/documents/{$news->documents}");

        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $news->delete();

        return $this->showbooking($del);

    }
}
 