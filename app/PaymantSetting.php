<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymantSetting extends Model
{
   protected $fillable = [
        'autor_id','bank_name','account_no','national_card',  'name','phone','email','paymantstatus'
    ];
}
