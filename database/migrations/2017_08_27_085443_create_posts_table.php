<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('short');
            $table->string('description');
            $table->string('address');
            $table->string('seller_name');
            $table->string('seller_email');
            $table->string('seller_number');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->integer('price');
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('status');
            $table->integer('type');
            $table->integer('views');
            $table->integer('seller_type');
            $table->json('search_sentence');
            $table->string('country');
            $table->string('city');

            $table->integer('isArchived')->default(0);
            $table->integer('isApproved')->default(1);

            $table->integer('isinMain')->default(0);
            $table->integer('isTop')->default(0);
            $table->integer('isUrgent')->default(0);
            $table->integer('isColored')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
