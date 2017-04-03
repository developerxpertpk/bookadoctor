<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function medicalcenters(){
        return $this->belongsToMany('App\Medicalcenter','medical_services','medical_center_id','service_id');
    }
}
