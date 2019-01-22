<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_admins', function (Blueprint $table) {
            //$table->integer('permission_id')->unsigned()->index();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
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

        Schema::dropIfExists('role_admins');
        // Schema::dropIfExists('premission_role');
        // Schema::dropforeign(array('admin_id','role_id'));
    }
}
