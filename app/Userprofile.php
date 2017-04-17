<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Userprofile extends Model
{

  //  protected $table='profile';
    protected $fillable=array('user_id','issue','contact_no','address','country','pincode','medical_center_info','title');
    protected $primaryKey='user_id';
//    public function users()
//    {
//        return $this->hasMany('App\User', 'id');
//        //Format hasmany has 2 parameters('Model to be connected with ','collumn to whit it will be connected in that table')
//    }

public function getUser(){
    return $this->belongsTo('App\User','user_id');
}

public function user(){
	return $this->hasOne('App\User','user_id');
}
public function doc(){
	return $this->hasOne('App\medicalcenter_doctor','doctor_id');
}
public function Servicepiv(){
	return $this->hasMany('App\speciality','user_id');
	//return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
}

}

