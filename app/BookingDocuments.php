<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDocuments extends Model
{
	protected $table = 'bookingdocuments';
    public function is_docs(){
    	return $this->belongsTo('App\Booking','booking_id');
    }
}
