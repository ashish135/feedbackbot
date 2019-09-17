<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'name' => 'Ashish Tomar',
            'email' => 'ashishtomar135@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('ashish'),
        ]);
        DB::table('users')->insert([
            'name' => 'Pooja Bhatt',
            'email' => 'poojab@gmail.com',
            'role' => 'user',
            'password' => bcrypt('ashish'),
        ]);
        DB::table('users')->insert([
            'name' => 'Rahul',
            'email' => 'rahul@gmail.com',
            'role' => 'user',
            'password' => bcrypt('ashish'),
        ]);
        DB::table('users')->insert([
            'name' => 'Devesh',
            'email' => 'dev@gmail.com',
            'role' => 'user',
            'password' => bcrypt('ashish'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ashish',
            'email' => 'ashishtmr50@gmail.com',
            'role' => 'user',
            'password' => bcrypt('ashish'),
        ]);
                
    }
}
