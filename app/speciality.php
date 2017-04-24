<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class speciality extends Model
{
  //protected $table = 'specialities';

     public function doctor_speciality()
    {
        return $this->hasMany('App\Doctor_Speciality', 'speciality_id');
    }

    public function speciality_user()
    {
    	return $this->hasMany('App\Userprofile','user_id');
    }
}
