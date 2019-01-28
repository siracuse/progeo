<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('address', 100);
            $table->string('phone', 10);
            $table->string('email', 50);
            $table->string('siret', 14);
            $table->string('photoInside', 50);
            $table->string('photoOutside', 50);
            $table->float('latitude', 10, 7);
            $table->float('longitude', 10, 7);

            $table->integer('cityId')->unsigned();
            $table->foreign('cityId')->references('id')->on('cities');

            $table->integer('categoryId')->unsigned();
            $table->foreign('categoryId')->references('id')->on('categories');

            $table->integer('managerId')->unsigned();
            $table->foreign('managerId')->references('id')->on('managers');

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
        Schema::dropIfExists('stores');
    }
}
