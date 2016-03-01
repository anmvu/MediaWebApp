<?php

use Illuminate\Database\Seeder;

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
        	'id'=>1,
        	'is_authorized'=>True,
        	'name'=>'An Vu',
        	'phone_num'=>7328508863,
        	'user'=>bcrypt('N14433367'),
        ]);
    }
}
