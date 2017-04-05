<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Doctor as Authenticatable;
use Illuminate\Http\Request;
use Auth;
use App\Booking;
use App\Doctor;

class DoctorBookingController extends Controller
{
    public function index(){

    	$a=Booking::has('book')->get();
    	
     	print_r($a);
     	die('gfvjffugggggy');
    	return view('patient.booking',compact('booking'));

    	//$booking = Booking::find(1);
    	//$booking->book->name;
    	//$booking_a = Booking::where('doctor','id')->name->get();
    	
    	}
    }