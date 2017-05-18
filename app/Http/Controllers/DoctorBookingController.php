<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Booking;
use App\Doctor;
use App\User;
use App\Schedule;
use App\BookingTransaction;
use App\Userprofile;
use Illuminate\Support\Facades\Mail;

class DoctorBookingController extends Controller
{
    public function index($id){

    	//$a=Booking::has('book')->get();
    	$a=Booking::all();

    	//$userr = Schedule::where('user_id');
    	$id = Schedule::where('user_id','=',5)->first();
    	//echo "<pre>";
    	//print_r($id->to);
    	//die('jhjhjjhjhjh');    	    
    	return view('patient.booking',compact('a','id'));
    	//$booking = Booking::find(1);
    	//$booking->book->name;
    	//$booking_a = Booking::where(','','id')->name->get();
    	
    	}


        public function completebooking($id,Request $request){

           $com =  $request['completes'];


           // echo"<pre>";
           // print_r($com);
           // die('ghgh');

           $book = Booking::find($id);
           $book->status = $com;
           $book->save();
        
           return redirect()->route('Doctor.booking');
         

          $k = $request['complete'];
          // print_r($k);
          // die('fgfgf');
         
            $currentId = $booking->status;
            // print_r($currentId);
            // die
            if($currentId == $k){
                echo "yes";

            }
            else{
                $booking->status = 1;
                $booking->save();
            }
           return redirect()->route('Doctor.booking');     
    }
    public function viewpage()
    {   
         
        return view('admin.payment');

    }
    public function viewlist()
    {
        $transaction=BookingTransaction::all();
        foreach($transaction as $key)
        {
            $key['doctor_name']=$key->booking->is_doctors->is_profile->first_name." ".$key->booking->is_doctors->is_profile->last_name;
           $key['patient_name']=$key->booking->is_users->is_profile->first_name." ".$key->booking->is_users->is_profile->last_name;
           $key['medicalcenter_name']=$key->booking->is_medical->is_profile->title;
           $key->created_at=$key->created_at->format('Y-m-d');
        }  

        return response()->json($transaction);

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

$userData = array();

        $userData['name'] = $name;
        $userData['email'] = $email;
        // $userData['password'] = $password;
        // $userData['seme_url'] = $url;


        Mail::send('emails.DoctorReschedulebooking', $userData, function ($message) use ($userData) {
            $message->to($userData['email'])
                    ->subject('Bookings Reschedule');
        });


    $book->save();
 return redirect()->route('Doctor.booking');
 
}
public function patientHistory($id){

  $booking = Booking::find($id);
  // echo"<pre>";
  // print_r($booking);
  // die('rtyui');
$paginate=3;
  $k = $booking->documents;
     
     // foreach($k as $key){
     //  print_r($key->documents);
     //   die('kkkk');
     // }
     // die('ghghgh');

  
  return view('doctor.patient-previous-history',compact('booking' , 'k','paginate'));
}


public function history($id){

  
   $booking = Booking::find($id);
   $booking = Booking::where('doctor_id','=',$id)->paginate(2);
   //    print_r($booking);
   // die();
 //  $bookingsPaginate = Booking::paginate(6);
   $bookingsPaginate = DB::table('bookings');


  // $o = $booking->id; 
    return view('doctor.patient-previous-history' , compact('booking','bookingsPaginate'));
  

}

public function bookinghistory(Request $request){
        // $term = Input::get('term');
        // print_r($term);
     
        $userrId= Auth::User()->id;

        $Userrid = User::find($userrId);
       $drBooking=  $Userrid->Drbookings;
       
  
  // echo"<pre>";
  // print_r($c);
  //       DIE('A');
        foreach ($drBooking as $key) {
           // echo"<pre>";
        
         
           // $z = $key->is_users->is_profile->first_name;
             
        
         }

        $term = $request['term'];
        $data = Userprofile::where('first_name', 'LIKE', '%' . $term . '%')->distinct()->get();
        
                      $return_array=[];
                foreach ($data as $name_data){
                    $return_array[]=array("id"=>$name_data->user_id,"label"=>"$name_data->first_name");
                    //$return_array['user_id'] = $name_data->user_id;
                    //$return_array['value'] = $name_data->user_id;
                    // print_r($return_array);
                    // die('ghghghhgh');
                  };

                //dd($name_data);
                return response()->json($return_array);

    }

  //   public function paging() {
  //   $bookingsPaginate = Booking::paginate(2);
  //   return redirect()->route('booking.history', compact('bookingsPaginate'));
  // }
 
    // public function logout(){
    //    return redirect('/');

    // }
  }
