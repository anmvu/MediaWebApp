<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
        	'name'=>'RoomType1',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType2',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType3',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType4',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType5',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType6',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType7',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType8',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType9',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('types')->insert([
        	'name'=>'RoomType10',
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
