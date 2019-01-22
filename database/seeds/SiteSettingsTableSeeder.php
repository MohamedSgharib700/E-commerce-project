<?php

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
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
        $f = "";
        $s = "1,90,193,123,392,327,272";
        for($i = 0; $i < 6; ++$i){
            $j = $faker->numberBetween(1,441);
            while(App\Categories::where('id', $j)->first()->parent_id != null)
                $j = $faker->numberBetween(1,441);
            $f .= $j . ',';
        }
        DB::table('site_settings')->insert(['site_name_ar' => 'قلف روتس', 'site_name_en' => 'gulfroots', 'tags_ar' => ' ', 'tags_en' => ' ',
         'meta_description_ar' => ' ', 'meta_description_en' => ' ', 'featured_categories' => $s, 'special_categories' => $f]);
    }
}
