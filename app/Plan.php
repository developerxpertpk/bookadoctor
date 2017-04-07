<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
protected $fillable=array( 'plan_type','plan_cost','description');
}



