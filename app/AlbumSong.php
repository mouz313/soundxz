<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumSong extends Model
{
   protected $fillable = [
        'title','status','image','autor_id',
    ];
}
