<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Userprofile;
use App\role;
use App\Booking;
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

    public function hasrole()
    {
        return $this->belongsTo('App\role', 'role_id');
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

    public function doctor(){
        return $this->hasMany('App\Booking', 'doctor_id','id');
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
        return $this->hasMany('App\Booking', 'user_id');
    }


    public function schedule()
    { 
       return $this->hasOne('App\Schedule', 'user_id');   
    }

    public function is_speciality(){
        return $this->belongsTo('App\speciality','user_id');
    }
//    Releation with medical center and doctor
    public function mmedicalcenter(){
        return $this->belongsToMany('App\medicalcenter_doctor','medicalcenter_id');
    }  


    public static function booking_complete_email_msg_to_patient($patient_email)
    {



        // Send email
        Mail::send('emails.completebooking', ['user' => $patient_email], function ($m) use ($patient_email) {
//            $m->from('hello@appsite.com', 'Your App Name');
            $m->to($patient_email,'')->subject('Welcome to APP');
        });


    }
    public static function booking_complete_email_msg_to_doctor($doctor_email)
    {



         // Send email
        Mail::send('emails.completebooking', ['user' => $doctor_email], function ($mm) use ($doctor_email) {
//            $m->from('hello@appsite.com', 'Your App Name');
            $mm->to($doctor_email,'')->subject('Welcome to APP');

});

    }

    public static function booking_reschedule_email_msg_to_patient($patient_email)
    {



         // Send email
        Mail::send('emails.reschedulebooking', ['user' => $patient_email], function ($mm) use ($patient_email) {
//            $m->from('hello@appsite.com', 'Your App Name');
            $mm->to($patient_email,'')->subject('Welcome to APP');

});

    }
    public static function booking_reschedule_email_msg_to_doctor($doctor_email)
    {



         // Send email
        Mail::send('emails.reschedulebooking', ['user' => $doctor_email], function ($mm) use ($doctor_email) {
//            $m->from('hello@appsite.com', 'Your App Name');
            $mm->to($doctor_email,'')->subject('Welcome to APP');

});

    }

    public static function booking_cancel_email_msg_to_patient($patient_email)
    {



         // Send email
        Mail::send('emails.cancelBooking', ['user' => $patient_email], function ($mm) use ($patient_email) {
//            $m->from('hello@appsite.com', 'Your App Name');
            $mm->to($patient_email,'')->subject('Welcome to APP');

});

    }
    public static function booking_cancel_email_msg_to_doctor($doctor_email)
    {



         // Send email
        Mail::send('emails.cancelBooking', ['user' => $doctor_email], function ($mm) use ($doctor_email) {
//            $m->from('hello@appsite.com', 'Your App Name');
            $mm->to($doctor_email,'')->subject('Welcome to APP');

});

    }
public static function booking_amount_refund_email_msg_to_patient($refund_email){
    // Send email
    Mail::send('emails.refundAmount', ['user' => $refund_email], function ($mm) use ($refund_email) {
//            $m->from('hello@appsite.com', 'Your App Name');
        $mm->to($refund_email,'')->subject('Welcome to APP');

    });
}

  public function medicalcenterdoctor(){
       return $this->hasOne('App\medicalcenter_doctor','doctor_id');
   }
    public function usersetting(){
        return $this->hasMany('App\Usersetting','user_id');
    }

}



