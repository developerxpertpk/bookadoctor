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
use App\speciality;
use App\Schedule;


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
  
$speciality = Doctor_Speciality::where('user_id' , '=' , Auth::User()->id
  )->get();

foreach($speciality as $key){
  //$user_id = 
  $op[]= $key -> speciality_id;
}

foreach($op as $sep_name){

  $speciality_nme = Speciality::where('id' , '=' , $sep_name)->first()->name;

$spe_name_arr[]=$speciality_nme;

}


 $booki = Booking::all()->where('doctor_id', '=' , Auth::User()->id);

  $counts = Booking::where('doctor_id', '=' , Auth::User()->id)->count();


$user = Auth::User();
 

  $userr = $user->is_Profile;

 return view('doctor.profile', compact('userr','speciality','spe_name_arr','count'));

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

  $a = Auth::User()->id;

$user = User::find($a);
 

$user->email=$request['email'];

$user->save();

// $doc = Userprofile::find($user->id);


$doc = Userprofile::where('user_id','=',Auth::User()->id )->first();
$doc->user_id=$user->id;

$doc->first_name=$request['first_name'];
$doc->last_name=$request['last_name'];
$doc->dob=$request['dob'];
 
$doc->gender=$request['gender'];

$doc['contact_no']=$request['contactno'];
$doc['address']=$request['address'];
$doc['state']=$request['state'];
$doc['city']=$request['city'];
$doc['country']=$request['country'];
$doc['pincode']=$request['pincode'];

 if($file = $request->hasFile('pic')) {
 
                     $file = $request->file('pic') ;
                     $fileName = $file->getClientOriginalName() ;
                     $extention = $file->getClientOriginalExtension();
                     $destinationPath = public_path().'/images/profile_pic/' ;
                     $file->move($destinationPath,$fileName);
                     $doc->images=$fileName;
                 }
 $doc->save();


return redirect()->route('doctor.profile');


 
 
 }

   public function viewBookings(){

   // $user = Auth::user()->is_Profile;
   // //$a = Booking::all()->is_users;
   // echo "<pre>";
   // print_r($user);
   // die('sss');
    $paginate=4;
// where('doctor_id', '=' , Auth::User()->id)->
   $booking = Booking::paginate($paginate);

   // $booking= Us/er::
   // echo "<pre>";
   // print_r($booking);
   // die();
 

      return view('doctor.booking', compact('booking','paginate'));
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
   
    // print_r($a);
    // die('kjkjkjkj');
 
    
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

  $medic_name= Auth::User()->is_Profile->title;
  // echo"<pre>";
  // print_r($medic_name);
  // die('jkjkjkj');

  return view('doctor.dashboard.home' ,compact('count','medic_name'));
 }

  public function manageschedule(Request $request){

    $user = Auth::User();
   
    $userr = $user->is_Profile;

    $schedule = $user->usersetting;
    $doctorId = $user->id;


// $schedules = Usersetting::where('user_id' , '=',$doctorId );
//                 $schedules = new Usersetting;
//                 $schedules->user_id=Auth::User()->id;
//                 $schedules->day=$request['days'];
//                 $schedules->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
//                 $schedules->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
//                 $schedules->save();
//                 return  redirect(route('manage.scedule',compact('user','doctorId','schedule','schedules')));
            

       return view('doctor.doctor-manage-schedule' , compact('userr','doctorId','schedule'));
  }

  public function insertschedule(Request $request){


     $user = Auth::User();

     $user_id = $user->id;
     // echo"<pre>";
     // print_r($a);
     // die('qwertyu');
  
   // echo"<pre>";
   // print_r($day);
   // die('jkjkjkjkj');

     if($request['days']!=NULL)
        {
      // Usersetting::where('user_id' , '=',$request['user_id'] )->count()==0)
            if(Usersetting::where('user_id' , '=',$request['user_id'] )){
                $schedule = new Usersetting;
                $schedule->user_id=$request['user_id'];
                $schedule->day=$request['days'];
                $schedule->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $schedule->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $schedule->save();
                return  redirect(route('manage.scedule' ,compact('user','user_id')));
            }
            else {

                $val=Usersetting::where('user_id' , '=',$request['user_id'])->pluck('id');
                $sch=Usersetting::find($val);
                $sch->day= $request['days'];
                $sch->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $sch->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $sch->save();
                return  redirect(route('manage.scedule',compact('user','user_id','day')));


            }
     }



}
public function deleteschedule($id){
 
  $delschedule = Usersetting::find($id)->delete();
  
     return redirect()->back();
}

public function editschedule(Request $request , $id){
   $user = Auth::User();

     $user_id = $user->id;
     
     $delschedule = Usersetting::find($id);
     $day = $delschedule->day;
     // echo"<pre>";
     // print_r($day);
     // die('mmmmm');
     $delschedule->time_in=$request['from_time'];
     $delschedule->time_out=$request['to_time'];
      $delschedule->save();
     return redirect()->back();

//      if($request['days']!=NULL)
//         {
//       // Usersetting::where('user_id' , '=',$request['user_id'] )->count()==0)
//             if(Usersetting::where('user_id' , '=',$request['user_id'] )){
//                 $schedule = new Usersetting;
//                 $schedule->user_id=$request['user_id'];
//                 $schedule->day=$request['days'];
//                 $schedule->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
//                 $schedule->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
//                 $schedule->save();
//                 return  redirect(route('manage.scedule' ,compact('user','user_id')));
//             }
//             else {

//                 $val=Usersetting::where('user_id' , '=',$request['user_id'])->pluck('id');
//                 $sch=Usersetting::find($val);
//                 $sch->day= $request['days'];
//                 $sch->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
//                 $sch->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
//                 $sch->save();
//                 return  redirect(route('manage.scedule',compact('user','user_id','day')));


//             }
// }
}

public function patientHistory($id){

  $booking = Booking::find($id);
  // echo"<pre>";
  // print_r($booking);
  // die('rtyui');

  $k = $booking->documents;
     
     // foreach($k as $key){
     //  print_r($key->documents);
     //   die('kkkk');
     // }
     // die('ghghgh');

  
  return view('doctor.patient-previous-history',compact('booking' , 'k'));
}


public function history($id){

  
   $booking = Booking::all();
   //  echo"<pre>";
   // print_r($booking);
   // die('hbhbfhbhheb');
   
   

 return view('doctor.patient-previous-history' , compact('booking'));
  

}

public function bookinghistory(Request $request){
        // $term = Input::get('term');
        // print_r($term);
        // DIE('A'); 
  $a= Auth::User()->id;
 
        $b = User::find($a);
        $c=  $b->drbookings;
  //echo"<pre>";
  // print_r($c);
  //       DIE('A');
        foreach ($c as $key) {
           // echo"<pre>";
           $z = $key->is_users->is_profile->first_name;
        
         }
        $term = $request['term'];
        $data = DB::table('userprofiles')->where('first_name', 'LIKE', '%' . $term . '%')->select('first_name','user_id')->distinct()->get();

                $return_array=[];
                foreach ($data as $name_data){
                    $return_array[]=array("id"=>$name_data->user_id,"label"=>"$name_data->first_name");
                    //$return_array['user_id'] = $name_data->user_id;
                    //$return_array['value'] = $name_data->user_id;
                    // print_r($return_array);
                    // die('ghghghhgh');
                  };
                  
                //dd($return_array);
                //dd($name_data);
                return response()->json($return_array);

    }


  public function historyProfile(Request $request){

    if(isset($_POST["page"])){
      $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
      if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
      $page_number = 1; //if there's no page number, set it to 1
    }

    $item_per_page=10;
    $id=$request->data1;
    $results = Booking::where('user_id','=',$id)->get();

    $get_total_rows = count($results); //hold total records in variable
    //break records into pages
    // $total_pages = ceil($get_total_rows[0]/$item_per_page);
    $total_pages = ceil($get_total_rows/$item_per_page);
    
    //get starting position to fetch the records
    $page_position = (($page_number-1) * $item_per_page);


    $links = paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);













      // echo "<pre>";
      // print_r($booking);
      // die('nnnnn');
   
     // foreach ($booking as $key) 
     // {
     //   $key['name']=$key->is_users->is_profile->first_name." ".$key->is_users->is_profile->last_name;
      
     
     //  $key['documents']=$key->documents;

     //  $key['booking']=Booking::where('user_id','=',$key->user_id)->where('doctor_id','=',Auth::User()->id)->paginate(4);
     //  // print_r($key['booking']);
     //  // dd($key['booking']);
     //  }
    //dd()
    //return response($booking);

    // return response()->json($booking);
      //return redirect()->route('user.profile',$id);
  }

  public function paginate_function($item_per_page, $current_page, $total_records, $total_pages){

    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
      $previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
        $next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
  }

public function AddDocuments($id){

 $booking_id=$id;
        $booking = Booking::find($booking_id);

  return view('doctor.add-documents',compact('booking'));
}
public function add_doctor_document_submit(Request $request)
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


        return $this->bookingsProfile($dooking_id);


    }


 

}