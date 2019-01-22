<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique(); 
            $table->string('name'); // Super Admin - Normal Admin
            $table->text('permissions'); // can create only - can CRUD
            $table->timestamps();
        });

        Schema::create('role_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->primary(array('user_id','role_id'));
        });

        Schema::create('role_admins', function (Blueprint $table) {
            $table->integer('admin_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->primary(array('admin_id','role_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_users');
        Schema::dropIfExists('role_admins');
    }
}
