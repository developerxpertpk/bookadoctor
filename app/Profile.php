<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{

  //  protected $table='profile';
    protected $fillable=array('user_id','about');
    protected $primaryKey='user_id';
//    public function users()
//    {
//        return $this->hasMany('App\User', 'id');
//        //Format hasmany has 2 parameters('Model to be connected with ','collumn to whit it will be connected in that table')
//    }

public function getUser(){
    return $this->belongsTo('App\User','id');
}
}
