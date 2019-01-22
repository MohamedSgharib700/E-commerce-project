<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('icon')->nullable();
            $table->timestamps();
            $table->integer('group_id')->unsigned();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->foreign('group_id')->references('id')->on('filters_groups')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('filters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filters');
    }
}
