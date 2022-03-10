<?php

use Illuminate\Database\Seeder;
use App\Price;

class SongPrice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $price = new Price();
        $price->price = '0.10';
       
        $price->save();
    }
}
