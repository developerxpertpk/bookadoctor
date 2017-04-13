<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\User;
use App\Userprofile;
use Auth;

class MedicalcenterBookingController extends Controller
{
    public function index(){
        $bookings=Booking::where('medic_id','=',Auth::user()->id)->get();
//        echo "<pre>";
//        print_r($bookings);
//        die('hsdd');

            return view('medicalcenter.bookings.show-bookings',compact('bookings'));
    }
    public function show_detail($id){
        $booking_detail=Booking::where('id','=',$id)->first();
        $doctor_detail= Userprofile::where('user_id','=',$booking_detail->doctor_id)->first();
        $paitent_detail= Userprofile::where('user_id','=',$booking_detail->user_id)->first();
//        echo "<pre>";
//        print_r($paitent_detail);
//
//        die('hsdd');

            return view('medicalcenter.bookings.show-booking-detail',compact('booking_detail','doctor_detail','paitent_detail'));
    }
    public function cancel_booking(Request $request,$id){

        $book = Booking::find($id);
        $book->status=$request['cancel_status'];
        $book->cancel_reason=$request['cancel_reason'];
        $book->save();
        return $this->show_detail($id);
    }
    public function reschedule_booking(Request $request,$id){

        $book = Booking::find($id);
        $book->status=$request['reschedule_status'];
        $book->reschedule_reason=$request['reschedule_reason'];
        $book->save();
        return $this->show_detail($id);
    }
    public function complete_booking($id){
        $book = Booking::find($id);
        $book->status=1;
        $book->save();
        return $this->show_detail($id);
    }

}
