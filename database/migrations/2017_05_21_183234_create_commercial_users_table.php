<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('contact_number');
            $table->string('whatsapp_number');
            $table->string('address');
            $table->string('logo');
            $table->string('phone_number');
            $table->string('country_code');
            $table->string('authy_id')->nullable();
            $table->boolean('verified')->default(false);
            $table->integer('commercial_record_number');
            $table->string('commercial_record_file');
            $table->string('maaroof_url');
            $table->string('longitude');
            $table->string('latitude');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commercial_users');
    }
}
