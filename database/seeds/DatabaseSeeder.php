<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminGroupsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CommercialUsersTableSeeder::class);
        $this->call(FiltersGroupsTableSeeder::class);
        $this->call(FiltersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);
        // $this->call(PostsTableSeeder::class);
    }
}
