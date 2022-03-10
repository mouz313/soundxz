<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'autor_id','total_amount','total_sell_song' 
    ];
}
