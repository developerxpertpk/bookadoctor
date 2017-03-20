<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Profile;
use App\Medicalcenter;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','last_name','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role_id',
    ];

    //Custom code below

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
        //matches the model
        //Structure for above foreign key will have belongs and has 2 parameters ('NAme of model', 'connection collumn name of the current model')
        // Second parameter takes the value of the collumn and matches it to the id of the stated model 
    }

    public function is_Profile()
    {
        return $this->hasMany('App\Profile', 'user_id');

    }
    public function is_MedicalCenter()
    {
        return $this->hasOne('App\Medicalcenter', 'user_id');

    }
}



