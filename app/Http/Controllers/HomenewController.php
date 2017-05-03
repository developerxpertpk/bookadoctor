<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Userprofile;
use DB;

class HomenewController extends Controller
{
      public function __construct()
    {
        $this->middleware('guest');
    }
  public function index()
  {

  	$page = Page::where('status','Active')->get();
    $locations=DB::table('userprofiles')->select(array('title','address', 'city', 'state','country'))->get();
    return view('index',compact('locations'));   

      // , compact('page')
  }

  public function show($page)
  {
  	$pagedata=Page::where([['slug','=','/'.$page],['status','=','Active']])->get();
  	$pagedata= $pagedata['0'];
  	$page = Page::where('status','Active')->get();
  	return view('page',compact('pagedata','page'));
  }
  public function city(Request $request)
    {
      $term=$request->term;
      $data=Userprofile::where('city','LIKE','%'.$term.'%')->select('city')->distinct()->get();
     // $data=loc::where('city','LIKE','%'.$term.'%')->get();
      //dd($data);
      $results=array();
      foreach ($data as $key => $v) {

          $results[]=['value'=>$v->city];

      }

      return response()->json($results);

    }
    public function state(Request $request)
    {
      $term=$request->term;
      $data=Userprofile::where('state','LIKE','%'.$term.'%')->select('state')->distinct()->get();
     // $data=loc::where('city','LIKE','%'.$term.'%')->get();
      //dd($data);

      $results=array();
      foreach ($data as $key => $v) {

          $results[]=['value'=>$v->state];

      }

      return response()->json($results);

    }
    public function country(Request $request)
    {
      $term=$request->term;
      $data=Userprofile::where('country','LIKE','%'.$term.'%')->select('country')->distinct()->get();
     // $data=loc::where('city','LIKE','%'.$term.'%')->get();
      //dd($data);

      $results=array();
      foreach ($data as $key => $v) {

          $results[]=['value'=>$v->country];

      }

      return response()->json($results);

    }
  

}
