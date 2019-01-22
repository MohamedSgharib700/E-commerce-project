<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        //
        for($i = 0; $i < 20; $i++) {
            DB::table('admins')->insert([
                'name' => $faker->name,
                'email'=> $faker->email,
                'password' => bcrypt('secret'),
                'group_id' => 1,
            ]);
        }
    }
}
