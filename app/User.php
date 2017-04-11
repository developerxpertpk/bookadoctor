<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Userprofile;
use App\role;
use Mail;


class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','role_id'
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

    public function has_role()
    {
        return $this->belongsTo('App\role', 'user_id');
        //matches the model
        //Structure for above foreign key will have belongs and has 2 parameters ('NAme of model', 'connection collumn name of the current model')
        // Second parameter takes the value of the collumn and matches it to the id of the stated model 
    }

    public function is_Profile()
    {
        return $this->hasOne('App\Userprofile', 'user_id');

    }
    public function showInfo(){
        return $this->belongsTo('App\Doctors', 'user_id');
    }

      public static function generatePassword()
    {
        // Generate random string and encrypt it.
        return bcrypt(str_random(35));
    }
    public static function sendWelcomeEmail($user)
    {
        // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($user);

        // Send email
        Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
//            $m->from('hello@appsite.com', 'Your App Name');
            $m->to($user->email, $user->name)->subject('Welcome to APP');


        });


    }

    public function bookings(){
        return $this->belongsTo('App\Booking', 'user_id');
    }


    public function schedule()
    { 
       return $this->hasOne('App\Schedule', 'user_id');   
    }

    public function is_speciality(){
        return $this->belongsTo('App\speciality','user_id');
    }
}



