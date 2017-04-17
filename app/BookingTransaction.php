<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTransaction extends Model
{
   public function booking()
   {
   		return $this->belongsTo('App\Booking','booking_id');
   }
}
