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
            'first_name'=>'Admin',
            'last_name' => 'User',
            'phone_num'=>6469973934,
            'user'=>'anvuisawesome',
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('users')->insert([
        	'id'=>2,
        	'is_authorized'=>True,
        	'first_name'=>'An',
            'last_name' => 'Vu',
        	'phone_num'=>7328508863,
        	'user'=>'N14433367',
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);'id'=
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
        DB::table('users')->insert([
            'id'=>4,
            'is_authorized' => 0,
            'active' => 1,
            'first_name' => "Nicholas",
            'last_name' => "Ng",
            'phone_num' => "7189385743",
            'user' => "21142229491712",
            'remember_token' => "",
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('users')->insert([
            'id'=5,
            'is_authorized' =>1,
            'active' => 1,
            'first_name' =>"Erich",
            'last_name' => "Chu",
            'phone_num' =>"6463873027",
            'user' => "N19676505",
            'remember_token' => "",
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' =>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('users')->insert([
            'id'=6,
            'is_authorized' =>1,
            'active' => 1,
            'first_name' =>"James",
            'last_name' => "Um",
            'phone_num' =>"3473874081",
            'user' => "N19183283",
            'remember_token' => "",
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' =>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('users')->insert([
            'id'=7,
            'is_authorized' =>0,
            'active' => 1,
            'first_name' =>"Reiko",
            'last_name' => "Ng",
            'phone_num' =>"3478602320",
            'user' => "21142230274065",
            'remember_token' => "",
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' =>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('users')->insert([
            'id'=8,
            'is_authorized' =>0,
            'active' => 1,
            'first_name' =>"Jimmy",
            'last_name' => "Yeung",
            'phone_num' =>"9173272876",
            'user' => "21142230404779",
            'remember_token' => "",
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' =>\Carbon\Carbon::now()->toDateTimeString(),
        ]);

    }
}
