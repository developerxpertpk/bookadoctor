<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	use Notifiable;

    protected $fillable = [
        'title', 'slug','excerpt','body','meta_description','meta_keywords',
    ];

    protected $hidden = [
       'remember_token',
    ];
}
