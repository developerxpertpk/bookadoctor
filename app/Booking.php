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
   	 return $this->hasOne('App\Doctor','doctor_id');
   }

   public function medic(){
   	 return $this->hasOne('App\Medicalcenter','medicalcenter_id');
   }

   public function sche(){
   	 return $this->hasOne('App\Schedule','schedule_id');
   }
}
 