<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_Speciality extends Model
{
        protected $table = 'doctor_speciality';

         public function Doctor()
    {
        return $this->belongsToMany('App\Doctor', 'doctors_id');
    }

     public function speciality()
    {
        return $this->belongsToMany('App\speciality', 'speciality_id');
    }
}

