<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Userprofile;

class HomenewController extends Controller
{
      public function __construct()
    {
        $this->middleware('guest');
    }
  public function index()
  {

  	$page = Page::where('status','Active')->get();
    return view('index');   

      // , compact('page')
  }

  public function show($page)
  {
  	$pagedata=Page::where([['slug','=','/'.$page],['status','=','Active']])->get();
  	$pagedata= $pagedata['0'];
  	$page = Page::where('status','Active')->get();
  	return view('page',compact('pagedata','page'));
  }
  
}
