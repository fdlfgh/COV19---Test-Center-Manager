<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' => 'Admin',
          'email' =>'admin@cov19.com',
          'role' =>'testCenterManager',
          'password' => bcrypt('123456')
        ]);
    }
}
