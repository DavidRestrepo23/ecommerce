<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeDetailProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_detail_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attribute_detail_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('impact_price')->nullable()->default(0);
            $table->string('image_url')->nullable();
            $table->timestamps();

            //Relations

            $table->foreign('attribute_detail_id')->references('id')->on('attribute_details');
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
        Schema::dropIfExists('attribute_detail_product');
    }
}
