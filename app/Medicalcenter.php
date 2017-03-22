<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

use Laravel\Cashier\Billable;

use App\Doctor;



class Medicalcenter extends Model
{
    use Billable;

    protected $fillable=array('user_id','descrption','title','medical_center_info ');
    protected $primaryKey='user_id';

    public function getUser(){
        return $this->belongsTo('App\User');
    }

    public function doctor(){
        return $this->hasmany('App\Doctor');
    }
    public function is_gallery(){
        return $this->hasmany('App\Medicalcenterimage');
    }
}
