<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countory extends Model
{
    protected $fillable = [
        'name', 'code', 
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
