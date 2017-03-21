<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Medicalcenter;
use App\Medicalcenterspecilazition;

class Doctor extends Model
{
    protected $fillable=array('user_id','medic_id','specilization_id','status','fname','lname');

    public function user()
    {
    	$this->belongsTo('User','user_id');
    }

    public function medical()
    {
    	$this->hasOne('App\Medicalcenter');
    }

    public function special()
    {
    	$this->belongsTo('medicalcenterspecilazition','specilization_id');
    }
}
