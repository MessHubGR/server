<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Theodore Messinezis',
        	'username' => 'TheoMessin',
        	'password' => bcrypt('password'),
        	'email' => 'theo@theomessin.com'
        ]);
    }
}
