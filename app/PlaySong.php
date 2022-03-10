<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaySong extends Model
{
    protected $fillable = [
        'user_id', 'song_id','like' 
    ];
}
