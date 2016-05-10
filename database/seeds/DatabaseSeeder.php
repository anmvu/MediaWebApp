<?php

use Illuminate\Database\Seeder;
use Database\seeds\AttributesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('TypesTableSeeder');
        $this->call('AssetsTableSeeder');
        $this->call('AttributesTableSeeder');
    }
}
