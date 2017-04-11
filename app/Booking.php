<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Doctor;
use App\Medicalcenters;
use App\Schedule;

class Booking extends Model
{
   

   public function is_users(){
   	 return $this->belongsTo('App\User','user_id');
   }

   
   
}
 