<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function medicalcenters(){
        return $this->belongsToMany('App\Medicalcenter');
    }
}
