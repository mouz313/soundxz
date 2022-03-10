<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'title', 
    ];

     public function autorsong()
    {
        return $this->hasMany(AutorSong::class);
    }
}
