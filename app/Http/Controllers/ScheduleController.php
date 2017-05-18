<?php

namespace App\Http\Controllers;
use App\Schedule;
use Carbon\Carbon;
use App\Usersetting;
use Illuminate\Http\Request;
use App\Userprofile;
use Redirect;
use Auth;

class ScheduleController extends Controller
{

    public function medical_schedule(Request $request){
  
        
        
                $schedule = new Usersetting;
                $schedule->user_id=$request['user_id'];
                $schedule->day=$request['days'];
                $schedule->time_in=Carbon::now()->todatestring()." ".$request['from_time'];
                $schedule->time_out=Carbon::now()->todatestring()." ".$request['to_time'];
                $schedule->save();
               
                return  redirect(route('medical.center.settings'));
         
            
        }
   
  




    public function deleteschedule($id){
 
  $delschedule = Usersetting::where('user_id','=',$id)->delete();
  
     return redirect()->back();
}

public function editschedule(Request $request , $id){
   
     
     $delschedule = Usersetting::where('user_id','=',$id)->first();
     $day = $delschedule->day;
   
     $delschedule->time_in=$request['from_time'];
     $delschedule->time_out=$request['to_time'];
      $delschedule->save();
     return redirect()->back();

}


	}

