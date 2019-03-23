<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodepromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codepromo', function (Blueprint $table) {
            $table->integer('promotion_id')->unsigned();
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codepromo');
    }
}
