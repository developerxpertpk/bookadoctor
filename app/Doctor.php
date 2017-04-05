<?php

namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;
//use App\Medicalcenter;
use App\Medicalcenterspecilazition;
use App\Booking;
class Doctor extends Model
{
    use Notifiable;

   

    protected $table = 'doctors';

    protected $fillable = [

        'fname','lname','medic_id','specialization_id', 'status','user_id','role_id','profile_pic',

    ];

     protected $hidden = [
         'remember_token',
    ];
    
    public function user()
    {
    	$this->belongsTo(User::class);
    }

     public function medicalcenters()
    {
        return $this->belongsTo('App\Medicalcenter', 'medic_id');
    }

    public function special()
    {
    	$this->belongsTo('medicalcenterspecilazition','specilization_id');
    }


     public function profile()
     {
        return $this->hasOne('App\User','user_id');
    } 

    public function user_doctors()
    {
        return $this->belongsTo('App\User', 'id');
    }
  public function doctor_speciality()
    {
        return $this->hasMany('App\Doctor_Speciality', 'doctors_id');
    }

    public function schedule()
    {
        return $this->hasOne('App\Schedule', 'user_id');
    }

     public function booki()
    {
        return $this->belongsTo('App\Booking', 'doctor_id');
    }
}
