<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Doctor;



class Medicalcenter extends Model
{
    protected $fillable=array('user_id','descrption','title','medical_center_info ');
    protected $primaryKey='user_id';

    public function getUser(){
        return $this->belongsTo('App\User');
    }

    public function doctor(){
        return $this->hasmany('App\Doctor');
    }
}
