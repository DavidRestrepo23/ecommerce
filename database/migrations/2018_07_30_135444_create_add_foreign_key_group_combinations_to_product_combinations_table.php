<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddForeignKeyGroupCombinationsToProductCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_combinations', function (Blueprint $table) {
            $table->integer('group_combination_id')->unsigned();
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
        Schema::table('product_combinations', function (Blueprint $table) {
            $table->dropColumn()('group_combination_color_id');
            $table->dropForeign('group_combination_color_id');
        });
    }
}
