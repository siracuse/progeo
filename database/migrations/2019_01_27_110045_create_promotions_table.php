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
            $table->string('startDate', 30);
            $table->string('endDate', 100);
            $table->string('name', 10);
            $table->string('activated', 50);
            $table->string('promotionsCode', 14);
            $table->string('opinionCode', 50);
            $table->string('photo1', 50);
            $table->string('photo2', 50);

            $table->integer('storeId')->unsigned();
            $table->foreign('storeId')->references('id')->on('stores');

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
