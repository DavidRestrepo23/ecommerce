<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            
            //Relation
            $table->integer('feature_id')->unsigned();
            $table->foreign('feature_id')->references('id')->on('features');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_details');
    }
}
