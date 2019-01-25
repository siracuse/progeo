<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_user', function (Blueprint $table) {
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');

            $table->integer('promotionId')->unsigned();
            $table->foreign('promotionId')->references('id')->on('promotions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_user');
    }
}
