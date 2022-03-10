<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    protected $fillable = [
        'user_id', 'autor_id','like' 
    ];
}
