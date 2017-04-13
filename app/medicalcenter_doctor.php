<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class medicalcenter_doctor extends Model
{
    protected $table = 'medicalcenter_doctor';
    public function user(){
        return $this->hasMany(User::class);
    }
    public function is_doctors(){
   	 return $this->belongsTo('App\User','doctor_id');
   }
}
