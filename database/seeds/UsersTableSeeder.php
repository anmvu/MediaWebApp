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
        	'id'=>2,
        	'is_authorized'=>True,
        	'first_name'=>'An',
            'last_name' => 'Vu',
        	'phone_num'=>7328508863,
        	'user'=>'N14433367',
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('users')->insert([
            'id'=>1,
            'is_authorized'=>True,
            'first_name'=>'Admin',
            'last_name' => 'User',
            'phone_num'=>6469973934,
            'user'=>'anvuisawesome',
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('users')->insert([
            'id'=>3,
            'is_authorized'=>False,
            'first_name'=>'Johnny',
            'last_name' => 'Test',
            'phone_num'=>12347890,
            'user'=>'N12345678',
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
