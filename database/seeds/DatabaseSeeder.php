<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(AdminUserSeeder::class);
        $this->call(VendorUserSeeder::class);
        $this->call(CreateUserSeeder::class);
         $this->call(SettingSeeder::class);
          $this->call(CountoriesSeeder::class);
           $this->call(CitySedder::class);
           $this->call(SongPrice::class);
    }
}
