<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name');
            $table->integer('type');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('filters_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filters_groups');
    }
}
