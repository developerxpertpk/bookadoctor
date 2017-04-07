<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Doctor;
use App\Medicalcenters;
use App\Schedule;

class Booking extends Model
{
   public function book(){
   	 return $this->hasOne('App\Doctor','id');
   }

   public function user(){
   	 return $this->hasMany('App\User','user_id');
   }

   

   
}
 