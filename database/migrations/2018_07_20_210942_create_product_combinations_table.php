<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_combinations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('combination');
            $table->string('key_color');
            $table->integer('stock')->nullable()->default(0);
            $table->string('reference')->nullable();
            $table->double('price')->nullable()->default(0);
            $table->double('price_tax')->nullable()->default(0);
            $table->double('discount')->nullable()->default(0);
            $table->string('images')->nullable();
            $table->integer('product_id')->unsigned();
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
        Schema::dropIfExists('product_combinations');
    }
}
