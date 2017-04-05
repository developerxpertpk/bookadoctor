<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

use Laravel\Cashier\Billable;

use App\Doctor;



class Medicalcenter extends Model
{
    use Billable;

    protected $table = 'medicalcenters';

    protected $fillable=array( 'user_id','descrption','title','medical_center_info ');
    
    public function doctors()
    {
    	return $this->hasMany('App\Doctor', 'medic_id');
    }

    public function is_gallery(){
        return $this->hasmany('App\Medicalcenterimage');
    }
    public function services(){
        return $this->belongsToMany('App\Service','medical_services','service_id','medical_center_id');
    }

     public function medic()
    {
        return $this->belongsTo('App\Booking', 'medicalcenter_id');
    }

}
