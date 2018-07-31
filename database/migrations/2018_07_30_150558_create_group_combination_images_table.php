<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupCombinationImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_combination_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->integer('group_combination_id')->unsigned();
            $table->timestamps();

            $table->foreign('group_combination_id')->references('id')->on('group_combinations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_combination_images');
    }
}
