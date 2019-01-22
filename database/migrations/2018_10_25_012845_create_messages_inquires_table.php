<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesInquiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_inquires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsigned();
            $table->integer('sentTo_id')->unsigned();
            $table->string('sender_name');
            $table->string('messages');
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
        //
    }
}
