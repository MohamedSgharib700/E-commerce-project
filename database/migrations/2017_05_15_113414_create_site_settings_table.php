<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name_ar');
            $table->string('site_name_en');
            $table->text('tags_ar');
            $table->text('tags_en');
            $table->text('meta_description_ar');
            $table->text('meta_description_en');
            $table->string('featured_categories')->default('');
            $table->string('special_categories')->default('');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}

