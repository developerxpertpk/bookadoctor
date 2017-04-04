<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorBookingController extends Controller
{
    public function index(){
    	
    	  Return view('patient.booking');
    }
}
