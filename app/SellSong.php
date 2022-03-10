<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellSong extends Model
{
   protected $fillable = [
        'invoice_id','user_id','song_name', 'song_id', 'price','subtotal','quantity','autor_id'
    ];
}
