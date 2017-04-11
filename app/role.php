<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    use Notifiable;

    protected $table='roles';


    protected $fillable = [
        'role', 'description',
    ];

    public function users()
    {
    	return $this->hasOne('App\User', 'user_id');
    	//Format hasmany has 2 parameters('Model to be connected with ','collumn to whit it will be connected in that table')
    }
}
