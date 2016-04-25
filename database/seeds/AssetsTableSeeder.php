<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->insert([
        	'barcode'=>'RH200',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH201',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH202',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH203',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH204',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH205',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH206',
        	'type_id'=>2,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH207',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH211',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH213',
        	'type_id'=>1,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH214',
        	'type_id'=>3,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH215',
        	'type_id'=>4,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH302',
        	'type_id'=>8,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH317',
        	'type_id'=>8,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH325',
        	'type_id'=>5,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH331',
        	'type_id'=>6,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH425',
        	'type_id'=>9,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'JAB473',
        	'type_id'=>6,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH503',
        	'type_id'=>8,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH505',
        	'type_id'=>8,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH602',
        	'type_id'=>8,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH603',
        	'type_id'=>10,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH615',
        	'type_id'=>10,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH704',
        	'type_id'=>10,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH705',
        	'type_id'=>10,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'RH708',
        	'type_id'=>10,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'JAB775',
        	'type_id'=>8,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'JAB775B',
        	'type_id'=>8,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
        	'barcode'=>'LC400',
        	'type_id'=>7,
        	'is_container'=> true,
        	'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
