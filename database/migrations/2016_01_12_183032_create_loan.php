<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->string('asset_id')->refences('id')->on('assets')->first()->primary();
            $table->string('signed_out_by')->references('id')->on('users');
            $table->longText('comments_before');
            $table->timestamp('when_out');
            $table->timestamp('when_due');
            $table->string('status');
            $table->string('borrowers_email');
            $table->string('borrowers_name');
            $table->string('room');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loan');
    }
}
