<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usersetting extends Model
{

 	 protected $table = 'usersettings';


    public function userrs(){
    	return $this->belongsTo('App/User','user_id');
    }

}
