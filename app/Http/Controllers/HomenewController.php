<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomenewController extends Controller
{
  public function index()
  {
      return view('homenew');
  }
}
