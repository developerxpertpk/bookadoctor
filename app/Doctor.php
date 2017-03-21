<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Medicalcenter;
use App\Medicalcenterspecilazition;

class Doctor extends Model
{
    use Notifiable;

    protected $fillable = [
        'fname','lname','medical_center_id','specialization_id', 'status','user_id',
    ];

     protected $hidden = [
         'role_id','remember_token',
    ];

    //protected $fillable=array('user_id','medic_id','specilization_id','status','fname','lname');

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
