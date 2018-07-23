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
            $table->string('combination')->unique();
            $table->integer('stock')->nullable()->default(0);
            $table->string('reference')->nullable()->unique();
            $table->double('impact_price')->nullable();
            $table->double('impact_price_tax')->nullable();
            $table->double('discount')->nullable();
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
