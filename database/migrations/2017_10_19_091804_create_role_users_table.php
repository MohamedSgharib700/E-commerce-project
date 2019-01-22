<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_users', function (Blueprint $table) {
            //$table->integer('permission_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            //$table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_users');
        //Schema::dropIfExists('premission_role');
        // Schema::dropforeign(array('user_id','role_id'));
    }
}
