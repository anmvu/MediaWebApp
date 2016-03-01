<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_assets', function (Blueprint $table) {
            $table->integer('asset_id')->references('id')->on('assets');
            $table->integer('attribute_id')->references('id')->on('attributes');
            $table->timestamps();
            $table->primary(['asset_id','attribute_id']);
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attribute_assets');
    }
}
