<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use Notifiable;

    protected $fillable = [
        'role', 'description',
    ];

    public function users()
    {
    	return $this->hasMany('App\User', 'role_id');
    	//Format hasmany has 2 parameters('Model to be connected with ','collumn to whit it will be connected in that table')
    }
}
