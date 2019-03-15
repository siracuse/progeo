<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('startDate')->index()->nullable();
            $table->dateTime('endDate')->index()->nullable();
            $table->string('name', 50);
            $table->boolean('activated')->index();
            $table->string('promotionCode', 3)->index();
            $table->string('opinionCode', 3);
            $table->string('photo1', 50)->nullable();
            $table->string('photo2', 50)->nullable();

            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores');

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
        Schema::dropIfExists('promotions');
    }
}
