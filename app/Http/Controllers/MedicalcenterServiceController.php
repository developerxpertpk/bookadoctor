<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalcenterServiceController extends Controller
{

    public function index(){
        return view('medicalcenter.services.add-services');
    }
}
