<?php

use Illuminate\Database\Seeder;

class CitySedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('cities')->insert([
            ['name' => 'Lahore','countory_id'=>1] ,
            ['name' => 'Karachi','countory_id'=>1],
             ['name' => 'Islamabad','countory_id'=>1] ,
            ['name' => 'Multan','countory_id'=>1],
             ['name' => 'BhawalPur','countory_id'=>1] ,
            ['name' => 'Gujrawala','countory_id'=>1],
             ['name' => 'Hedrabad','countory_id'=>1] ,
            ['name' => 'Peshawar','countory_id'=>1]
        ]);
    }
}
