<?php

namespace App\Http\Controllers;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
class ScheduleController extends Controller
{
public function insert(Request $request){
	if($request['weekdays']!=NULL)
	{
	if(Schedule::where('user_id' , '=',$request['user_id'] )->count()==0){
			$schedule = new Schedule;
		$schedule->user_id=$request['user_id'];
		$schedule->days=implode(",", $request['weekdays']);
		$schedule->from=Carbon::now()->todatestring()." ".$request['from_time'];
		$schedule->to=Carbon::now()->todatestring()." ".$request['to_time'];
		$schedule->save();
		return  redirect('/show-doctor-info');
	}
	else {
		
		$val=Schedule::where('user_id' , '=',$request['user_id'])->pluck('id');
		$sch=Schedule::find($val);
		$sch->days=implode(",", $request['weekdays']);
		$sch->from=Carbon::now()->todatestring()." ".$request['from_time'];
		$sch->to=Carbon::now()->todatestring()." ".$request['to_time'];
		$sch->save();
		return  redirect('/show-doctor-info');
		
		
	}
}
    // echo "<pre>";
	    // print_r($schedule);
	    // die('haha');
	    // $schedule->save();
	    // $zara=$schedule->to;
	    // echo date('H:i:s',strtotime($zara));
	    // die();
	        }
	      //   <p><b>Days:</b>{{ $user->is_doctor->schedule->days }}</p> 
	// <p><b>From:</b> {{ date('H:i:s',strtotime($user->is_doctor->schedule->from)) }}</p>
	// <p><b>To:</b>{{ $user->created_at->toTimeString() }}</p>
	      
	// {{ $user->created_at->toTimeString() }}
	}

