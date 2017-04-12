<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   
    public $timestamps = false;

    public function doctor()
    {
        return $this->belongsTo('App\Doctor','user_id');
    } 

    public function user()
    {
    	return $this->belongsTo('App\User','id');
    }
    
}
