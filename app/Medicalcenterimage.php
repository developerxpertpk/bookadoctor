<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Medicalcenterimage extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medical_center_id','images'
    ];
    public function medicalcenter()
    {
        $this->belongsTo('Medicalcenter','medical_center_id');
    }

}
