<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id')->references('id')->on('assets');
            $table->integer('user_id')->references('id')->on('users');
            $table->mediumText('comment_before');
            $table->timestamp('due');
            $table->boolean('is_returned')->default(false);
            $table->string('email');
            $table->string('loaned_to');
            $table->integer('container_id')->references('id')->on('assets');
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
        Schema::drop('loans');
    }
}
