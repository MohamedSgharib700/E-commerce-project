<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PostsTableSeeder extends Seeder
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
        for($i = 1; $i <= 500; $i++) {
            $search_sentence = [];
            $post = App\Posts::create([
                'title' => 'منتج'. $i,
                'short' => $faker->realText(100),
                'description' => $faker->realText(200),
                'address' => $faker->address,
                'seller_name' => $faker->name,
                'seller_email' => $faker->email,
                'seller_number' => $faker->phoneNumber,
                'price' => $faker->numberBetween(1000,2500),
                'category_id' => $faker->numberBetween(1,441),
                'user_id' => $faker->numberBetween(1,20),
                'isArchived' => 0,
                'isApproved' => 1,
                'isTop' => $faker->numberBetween(0, 1),
                'search_sentence' => "",
            ]);
            $post->country;
            $post->city = ِApp\Filters::where('group_id', 2)->inRandomOrder()->first();
            dd($post->city);
            $search_sentence .= ' ' . $list2->random();
            $search_sentence['category'] = "";
            $ancestor = App\Categories::findorfail($post->category_id);
            $search_sentence['category'] .= ' ' . $ancestor->name;
            while($ancestor->parent_id != null){
                $ancestor = App\Categories::findorfail($ancestor->parent_id);
                $search_sentence['category'] .= ' ' . $ancestor->name;
            }
            //add post_features
            $search_sentence['نوع الاعلان'] = "";
            if($i % 2){
                for($j = 0; $j < 1; $j++){
                    $tmp = App\PostFeatures::create([
                        'type' => $faker->numberBetween(1,2),
                        'post_id' => $i,
                        'expiry_date' => $post->created_at->addDays($faker->numberBetween(7,30)),
                    ]);
                    if($tmp->type == 1){
                        $search_sentence['نوع الاعلان'] .= ' paid isColored اعلانات مدفوعه ملونة';
                    }
                    if($tmp->type == 2){
                        $search_sentence['نوع الاعلان'] .= ' paid isinMain اعلانات مدفوعه مميزة';
                    }
                }
            }else{
                for($j = 0; $j < 1; $j++){
                    $tmp = App\PostFeatures::create([
                        'type' => 5,
                        'post_id' => $i,
                        'expiry_date' => $post->created_at->addDays($faker->numberBetween(7,30)),
                    ]);
                    $search_sentence['نوع الاعلان'] .= ' isUrgent اعلانات مدفوعه عاجلة';
                }
            }
            if($post->isinTop = 1){
                App\PostFeatures::create([
                    'type' => 3,
                    'post_id' => $i,
                    'expiry_date' => $post->created_at->addDays($faker->numberBetween(7,30)),
                ]);
                $search_sentence['نوع الاعلان'] .= ' paid isinTop أفضل الاعلانات';
            }
            //add post filters
            $post->search_sentence = $search_sentence;
            $post->save();
            $hash = $this->pageId('posts', $post->id);
            DB::table('posts_dictionaries')->insert([
                'hash' => $hash,
                'post_id' => $post->id,
            ]);

            for($j = 0; $j < 10; $j++){
                DB::table('post__photos')->insert([
                    'photolink' => 'images/1512666410.png',
                    'post_id' => $i,
                ]);
            }
        }
    }
    private function pageId($identifier, $id = null)
    {
        $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, $identifier);
        if ($id) {
            $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, $identifier . '-' . $id);
        }
        return $uuid5;
    }
}
