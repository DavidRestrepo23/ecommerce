<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureDetailProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_detail_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feature_detail_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->timestamps();

            //Relations

            $table->foreign('feature_detail_id')->references('id')->on('feature_details');
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
        Schema::dropIfExists('feature_detail_product');
    }
}
