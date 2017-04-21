<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usersetting extends Model
{
public function userrs(){
    return $this->belongsTo('App/User','user_id');
}
}
