<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceSpecificsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_specifics', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price')->nullable();
            $table->double('price_tax')->nullable();
            $table->double('discount')->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->timestamps();

            //Relation
            $table->foreign('product_id')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_specifics');
    }
}
