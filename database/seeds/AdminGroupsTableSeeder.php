<?php

use Illuminate\Database\Seeder;

class AdminGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin_groups')->insert(['name' => 'dummy', 'permissions' => 'kteer']);
    }
}
