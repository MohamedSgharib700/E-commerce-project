<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFiltersGroupPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_filters_groups', function (Blueprint $table) {
            $table->integer('categories_id')->unsigned()->index();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('filters_groups_id')->unsigned()->index();
            $table->foreign('filters_groups_id')->references('id')->on('filters_groups')->onDelete('cascade');
//            $table->primary(['categories_id', 'filters_groups_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories_filters_groups');
    }
}
