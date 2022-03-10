<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Vendor extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'vendor';

        protected $fillable = [
            'name', 'email', 'password','countory_id','city_id','number','status','address','image','description','img','education'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }