<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutorSong extends Model
{
   protected $fillable = [
        'title','category_id' ,'song','song_pre','status','autor_id','img','filename'
    ];

     public function song()
    {
        return $this->belongsTo(Song::class)->withTrashed();
    }
}
