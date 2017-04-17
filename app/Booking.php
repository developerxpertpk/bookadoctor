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

   public function documents(){
   	    return $this->hasMany('App\BookingDocuments', 'booking_id');
   }

   public function is_doctors(){
   	 return $this->belongsTo('App\User','doctor_id');
   }
   public function is_medical(){
       return $this->belongsTo('App\User','medic_id');
   }
   public function transaction()
   {
   		return $this->hasOne('App\BookingTransaction','booking_id');
   }

   

   
}
 