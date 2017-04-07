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
    }