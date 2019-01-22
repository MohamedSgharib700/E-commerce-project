<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->integer('status');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->string('slug');
            $table->string('icon');
            $table->string('photo');

            $table->integer('posts_count')->default(0);
            $table->integer('posts_views')->default(0);
            $table->integer('category_views')->default(0);
            $table->timestamps();
            
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
