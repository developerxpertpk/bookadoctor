<?php

namespace App\Http\Controllers;
use App\Schedule;
use Carbon\Carbon;
use App\Usersetting;
use Illuminate\Http\Request;
class ScheduleController extends Controller
{
public function insert(Request $request){
	if($request['weekdays']!=NULL)
	{
	if(Usersetting::where('user_id' , '=',$request['user_id'] )->count()==0){
			$schedule = new Usersetting;
		$schedule->user_id=$request['user_id'];
		$schedule->day=implode(",", $request['weekdays']);
		$schedule->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
		$schedule->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
		$schedule->save();
		return  redirect('/show-doctor-info');
	}
	else {
		
		$val=Usersetting::where('user_id' , '=',$request['user_id'])->pluck('id');
		$sch=Usersetting::find($val);
		$sch->day=implode(",", $request['weekdays']);
		$sch->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
		$sch->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
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




    public function doctor_schedule(Request $request){
        if($request['weekdays']!=NULL)
        {
            if(Usersetting::where('user_id' , '=',$request['user_id'] )->count()==0){
                $schedule = new Usersetting;
                $schedule->user_id=$request['user_id'];
                $schedule->day=implode(",", $request['weekdays']);
                $schedule->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $schedule->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $schedule->save();
                return  redirect(route('add-doctor.index'));
            }
            else {

                $val=Usersetting::where('user_id' , '=',$request['user_id'])->pluck('id');
                $sch=Usersetting::find($val);
                $sch->day=implode(",", $request['weekdays']);
                $sch->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $sch->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $sch->save();
                return  redirect(route('add-doctor.index'));


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

    public function medical_schedule(Request $request){
        if($request['weekdays']!=NULL)
        {
            if(Usersetting::where('user_id' , '=',$request['user_id'] )->count()==0){
                $schedule = new Usersetting;
                $schedule->user_id=$request['user_id'];
                $schedule->day=implode(",", $request['weekdays']);
                $schedule->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $schedule->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $schedule->save();
                return  redirect(route('medical.center.settings'));
            }
            else {

                $val=Usersetting::where('user_id' , '=',$request['user_id'])->pluck('id');
                $sch=Usersetting::find($val);
                $sch->day=implode(",", $request['weekdays']);
                $sch->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $sch->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $sch->save();
                return  redirect(route('medical.center.settings'));


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

