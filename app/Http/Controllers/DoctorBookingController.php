<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Http\Request;
use Auth;
use App\Booking;
use App\Doctor;
use App\Schedule;

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
         
    }

public function reschedulebooking(Request $request,$id){

   // $booking = Booking::find($id)->first();

    // echo "<pre>";
    $r = $request['reschedules'];
   

    $reason = $request['reschedule'];
    $book = Booking::find($id);
    $book->reschedule_reason=$reason;
    $book->status = $r;
    $book->save();
 return redirect()->route('Doctor.booking');
   // $booking->save();

    
}

// public  function cancelbooking(Request $request)
//     {
//         if($request['cancels']){
//              $cancel[] = ['key' => 'Your Booking Has been canceled, Please Reschedule it.'];
//         }
//         else ($request['reschedules']){
//             $reschedule[] = ['key' => 'Your Booking Has been rescheduled, Thank You.'];
//         }

        

//     }
}