<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use Notifiable;

    protected $fillable = [
        'fname','lname','medical_center_id','specialization_id', 'status','user_id',
    ];

     protected $hidden = [
         'role_id','remember_token',
    ];
}
