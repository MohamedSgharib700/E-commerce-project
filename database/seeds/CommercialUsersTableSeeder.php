<?php

use Illuminate\Database\Seeder;

class CommercialUsersTableSeeder extends Seeder
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
        for($i = 1; $i <= 10; $i++) {
            App\CommercialUsers::create([
                'user_id' => $i,
                'whatsapp_number' => $faker->phoneNumber,
                'contact_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'logo' => "/images/ad1.jpg",
                'phone_number' => $faker->phoneNumber,
                'country_code' =>$faker->areaCode,
                'commercial_record_number' => $faker->bankAccountNumber,
                'maaroof_url' => $faker->url,
            ]);
        }
    }
}
