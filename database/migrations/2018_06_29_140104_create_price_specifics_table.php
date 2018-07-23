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
            $table->double('price');
            $table->double('price_tax');
            $table->double('discount')->nullable();
            $table->timestamps();

            //Relation
            $table->integer('product_id')->unsigned();
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
