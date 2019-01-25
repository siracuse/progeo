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
            $table->string('name', 30);
            $table->string('address', 100);
            $table->string('phone', 10);
            $table->string('mail', 50);
            $table->string('siret', 14);
            $table->string('photoInside', 50);
            $table->string('photoOutside', 50);
            $table->float('latitude', 10, 7);
            $table->float('longitude', 10, 7);


            $table->integer('cityId')->unsigned();
            $table->foreign('cityId')->references('id')->on('cities');

            $table->integer('categoryId')->unsigned();
            $table->foreign('categoryId')->references('id')->on('categories');

            $table->integer('subCategoryId')->unsigned();
            $table->foreign('subCategoryId')->references('id')->on('subCategories');

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
        Schema::dropIfExists('promotions');
    }
}
