<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = new User;
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('password'); 
        $user->number = '03356789877';
        $user->countory_id='1';       
        $user->save();
    }
}
