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
        DB::table('assets')->insert([
            'barcode'=>'BenQ1',
            'type_id'=>27,
            'is_container'=> false,
            'loanable'=> true,
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
            'barcode'=>'CrestronSwitcher1',
            'type_id'=>30,
            'is_container'=> false,
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
            'barcode'=>'CrestronTouchPanel1',
            'type_id'=>11,
            'is_container'=> false,
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
            'barcode'=>'CrestronVideoReceiver1',
            'type_id'=>12,
            'is_container'=> false,
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
            'barcode'=>'BluRay1',
            'type_id'=>13,
            'is_container'=> false,
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
            'barcode'=>'VGA1',
            'type_id'=>14,
            'is_container'=> false,
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
        DB::table('assets')->insert([
            'barcode'=>'HDMI1',
            'type_id'=>15,
            'is_container'=> false,
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
