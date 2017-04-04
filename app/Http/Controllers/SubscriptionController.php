<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$plan = Plan::all();
    	return view('admin.plancrud',compact('plan'));
    	die('hahha');
    }

    public function create()
    {
    	return view('admin.plancreate');

    }

    public function store(Request $request)
    {
    	$this->validate($request, [
          'name' => 'required',
          'body' => 'required',
          'cost' => 'required',
      ]);
    	$adminnew = new Plan;
    	$adminnew->name = $request->name;
    	$adminnew->cost = $request->cost;
    	$adminnew->details = $request->body;
    	$adminnew->save();
    	return redirect()->route('subscription.list');
    }

    public function update()

    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }

}
