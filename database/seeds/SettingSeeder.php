<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting;
        $setting->title = 'Song XZ';
        $setting->image ='images/logo.png';
        $setting->link = 'www.fb.com';
        $setting->save();
       
         
    }
}
