<?php

use Illuminate\Database\Seeder;
use App\Vendor;
class VendorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor = new Vendor;
        $vendor->name = 'Autor';
        $vendor->email = 'author@gmail.com';
        $vendor->password = bcrypt('password'); 
         $vendor->number = '03356789877';
        $vendor->countory_id='1'; 
         $vendor->city_id='2';
         $vendor->img ='images/logo.png';
         $vendor->address='St#23-A H#12-A';   

        $vendor->save();
    }
}
