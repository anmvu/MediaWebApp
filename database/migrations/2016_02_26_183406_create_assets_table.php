<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barcode')->unique();
            $table->integer('type_id')->references('id')->on('types');
            $table->timestamp('time_checked')->nullable();
            $table->integer('last_checked_by')->nullable()->references('id')->on('users');
            $table->integer('container_id')->references('id')->on('assets')->nullable();
            $table->boolean('is_container')->default(false);
            $table->boolean('has_problems')->default(false);
            $table->boolean('loanable')->default(false);
            $table->boolean('enabled')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assets');
    }
}
