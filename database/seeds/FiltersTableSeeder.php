<?php

use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('filters')->insert(['name' => 'السعودية', 'group_id' => '1']);// id = 1

        DB::table('filters')->insert(['name' => 'الرّياض', 'group_id' => '2']);// id = 2
        DB::table('filters')->insert(['name' => 'جدة', 'group_id' => '2']);// id = 3
        DB::table('filters')->insert(['name' => 'مكة المُكرمة', 'group_id' => '2']);// id = 4
        DB::table('filters')->insert(['name' => 'المدينة المنورة', 'group_id' => '2']);// id = 5
        DB::table('filters')->insert(['name' => 'الأحساء', 'group_id' => '2']);//id = 6
        DB::table('filters')->insert(['name' => 'الطائف', 'group_id' => '2']);//id = 7
        DB::table('filters')->insert(['name' => 'خميس مشيط', 'group_id' => '2']);//id = 8
        DB::table('filters')->insert(['name' => 'حائل', 'group_id' => '2']);//id = 9
        DB::table('filters')->insert(['name' => 'حفر الباطن', 'group_id' => '2']);//id = 10
        DB::table('filters')->insert(['name' => 'الجبيل', 'group_id' => '2']);//id = 11
        DB::table('filters')->insert(['name' => 'الخرج', 'group_id' => '2']);//id = 12
        DB::table('filters')->insert(['name' => 'أبها', 'group_id' => '2']);//id = 13
        DB::table('filters')->insert(['name' => 'الدّمام', 'group_id' => '2']);//id = 14
        DB::table('filters')->insert(['name' => 'نجران', 'group_id' => '2']);//id = 15
        DB::table('filters')->insert(['name' => 'بريدة', 'group_id' => '2']);//id = 16
        DB::table('filters')->insert(['name' => 'ينبع', 'group_id' => '2']);//id = 17
        DB::table('filters')->insert(['name' => 'تبوك', 'group_id' => '2']);//id = 18
        DB::table('filters')->insert(['name' => 'القنفذة', 'group_id' => '2']);//id = 19
        DB::table('filters')->insert(['name' => 'القطيف', 'group_id' => '2']);//id = 20
        DB::table('filters')->insert(['name' => 'جازان', 'group_id' => '2']);//id = 21

        DB::table('filters')->insert(['name' => 'بالساعة', 'group_id' => '3']);//id = 22
        DB::table('filters')->insert(['name' => 'شهري', 'group_id' => '3']);//id = 23
        DB::table('filters')->insert(['name' => 'سنوي', 'group_id' => '3']);//id = 24
        DB::table('filters')->insert(['name' => 'سنوي + عمولة', 'group_id' => '3']);//id = 25
        DB::table('filters')->insert(['name' => 'عمولة فقط', 'group_id' => '3']);//id = 26
        DB::table('filters')->insert(['name' => 'غير مدفوع', 'group_id' => '3']);//id = 27
        
        DB::table('filters')->insert(['name' => 'دوام كامل', 'group_id' => '4']);//id = 28
        DB::table('filters')->insert(['name' => 'أوقات محددة', 'group_id' => '4']);//id = 29
        DB::table('filters')->insert(['name' => 'بالساعة', 'group_id' => '4']);//id = 30
        DB::table('filters')->insert(['name' => 'مرة واحدة', 'group_id' => '4']);//id = 31
        DB::table('filters')->insert(['name' => 'تطوع', 'group_id' => '4']);//id = 32

        DB::table('filters')->insert(['name' => 'وكالة', 'group_id' => '5']);//id = 33
        DB::table('filters')->insert(['name' => 'خاص', 'group_id' => '5']);//id = 34

        DB::table('filters')->insert(['name' => 'ساري', 'group_id' => '6']);//id = 35
        DB::table('filters')->insert(['name' => 'منتهي', 'group_id' => '6']);//id = 36
        
        DB::table('filters')->insert(['name' => 'فولكس', 'group_id' => '7', 'icon' => 'images/cars1.jpg']);//id = 37
        DB::table('filters')->insert(['name' => 'باسات', 'group_id' => '8', 'parent_id' => '37']);//id = 38
        DB::table('filters')->insert(['name' => '2017', 'group_id' => '9', 'parent_id' => '38']);//id = 39
        DB::table('filters')->insert(['name' => '2018', 'group_id' => '9', 'parent_id' => '38']);//id = 40
        DB::table('filters')->insert(['name' => 'جيتا', 'group_id' => '8', 'parent_id' => '37']);//id = 41
        DB::table('filters')->insert(['name' => '2017', 'group_id' => '9', 'parent_id' => '41']);//id = 42
        DB::table('filters')->insert(['name' => '2018', 'group_id' => '9', 'parent_id' => '41']);//id = 43

        DB::table('filters')->insert(['name' => 'نيونا', 'group_id' => '7', 'icon' => 'images/cars2.jpg']);//id = 44
        DB::table('filters')->insert(['name' => 'كورولا', 'group_id' => '8', 'parent_id' => '44']);//id = 45
        DB::table('filters')->insert(['name' => '2017', 'group_id' => '9', 'parent_id' => '45']);//id = 46
        DB::table('filters')->insert(['name' => '2018', 'group_id' => '9', 'parent_id' => '45']);//id = 47
        DB::table('filters')->insert(['name' => 'ياريس', 'group_id' => '8', 'parent_id' => '44']);//id = 48
        DB::table('filters')->insert(['name' => '2017', 'group_id' => '9', 'parent_id' => '48']);//id = 49
        DB::table('filters')->insert(['name' => '2018', 'group_id' => '9', 'parent_id' => '48']);//id = 50
        DB::table('filters')->insert(['name' => 'هونداي', 'group_id' => '7', 'icon' => 'images/cars8.jpg']);//id = 51
        DB::table('filters')->insert(['name' => 'أكسنت', 'group_id' => '8', 'parent_id' => '51']);//id = 52
        DB::table('filters')->insert(['name' => '2017', 'group_id' => '9', 'parent_id' => '52']);//id = 53
        DB::table('filters')->insert(['name' => '2018', 'group_id' => '9', 'parent_id' => '52']);//id = 54
        DB::table('filters')->insert(['name' => 'إلانترا', 'group_id' => '8', 'parent_id' => '51']);//id = 55
        DB::table('filters')->insert(['name' => '2017', 'group_id' => '9', 'parent_id' => '55']);//id = 56
        DB::table('filters')->insert(['name' => '2018', 'group_id' => '9', 'parent_id' => '55']);//id = 57
        
        DB::table('filters')->insert(['name' => 'سوبارو', 'group_id' => '7', 'icon' => 'images/cars3.jpg']);//id = 44
        DB::table('filters')->insert(['name' => 'نيسان', 'group_id' => '7', 'icon' => 'images/cars4.jpg']);//id = 44
        DB::table('filters')->insert(['name' => 'ميتسوبيشي', 'group_id' => '7', 'icon' => 'images/cars5.jpg']);//id = 44
        DB::table('filters')->insert(['name' => 'مارسيدس', 'group_id' => '7', 'icon' => 'images/cars6.jpg']);//id = 44
        DB::table('filters')->insert(['name' => 'مازدا', 'group_id' => '7', 'icon' => 'images/cars7.jpg']);//id = 44
        DB::table('filters')->insert(['name' => 'فورد', 'group_id' => '7', 'icon' => 'images/cars9.jpg']);//id = 44

        DB::table('filters')->insert(['name' => 'أبيض', 'group_id' => '10']);
        DB::table('filters')->insert(['name' => 'أسود', 'group_id' => '10']);
        DB::table('filters')->insert(['name' => 'أخضر', 'group_id' => '10']);
        DB::table('filters')->insert(['name' => 'أحمر', 'group_id' => '10']);
        DB::table('filters')->insert(['name' => 'أزرق', 'group_id' => '10']);
        DB::table('filters')->insert(['name' => 'بنفسجي', 'group_id' => '10']);
        DB::table('filters')->insert(['name' => 'بودري', 'group_id' => '10']);

        DB::table('filters')->insert(['name' => '1400 cc', 'group_id' => '11']);
        DB::table('filters')->insert(['name' => '1500 cc', 'group_id' => '11']);
        DB::table('filters')->insert(['name' => '1600 cc', 'group_id' => '11']);
        DB::table('filters')->insert(['name' => '1700 cc', 'group_id' => '11']);
        DB::table('filters')->insert(['name' => '1800 cc', 'group_id' => '11']);

        DB::table('filters')->insert(['name' => 'أوتوماتيك', 'group_id' => '12']);
        DB::table('filters')->insert(['name' => 'مانيوال', 'group_id' => '12']);
        DB::table('filters')->insert(['name' => 'غاز', 'group_id' => '13']);
        DB::table('filters')->insert(['name' => 'بنزين', 'group_id' => '13']);

        DB::table('filters')->insert(['name' => 'موجودة', 'group_id' => '14']);
        DB::table('filters')->insert(['name' => 'ليست موجوة', 'group_id' => '14']);

        DB::table('filters')->insert(['name' => 'جر أمامي', 'group_id' => '15']);
        DB::table('filters')->insert(['name' => 'جر خلفي', 'group_id' => '15']);

        DB::table('filters')->insert(['name' => 'مكشوفة', 'group_id' => '16', 'icon' => 'images/car1.jpg']);
        DB::table('filters')->insert(['name' => 'كوبية', 'group_id' => '16', 'icon' => 'images/car2.jpg']);
        DB::table('filters')->insert(['name' => 'هاتشباك', 'group_id' => '16', 'icon' => 'images/car3.jpg']);
        DB::table('filters')->insert(['name' => 'سيدان', 'group_id' => '16', 'icon' => 'images/car4.jpg']);
        DB::table('filters')->insert(['name' => 'متعددة الأغراض', 'group_id' => '16', 'icon' => 'images/car5.jpg']);
        DB::table('filters')->insert(['name' => 'شاحنة', 'group_id' => '16', 'icon' => 'images/car6.jpg']);
        DB::table('filters')->insert(['name' => 'نصف نقل', 'group_id' => '16', 'icon' => 'images/car7.jpg']);
        DB::table('filters')->insert(['name' => 'نقل جماعي', 'group_id' => '16', 'icon' => 'images/car8.jpg']);
        DB::table('filters')->insert(['name' => 'عائلية', 'group_id' => '16', 'icon' => 'images/car9.jpg']);
        DB::table('filters')->insert(['name' => 'أخري', 'group_id' => '16', 'icon' => 'images/car10.jpg']);
        
        DB::table('filters')->insert(['name' => 'غرفة واحدة', 'group_id' => '17']);
        DB::table('filters')->insert(['name' => 'غرفتين', 'group_id' => '17']);
        DB::table('filters')->insert(['name' => 'ثلاث غرف', 'group_id' => '17']);
        DB::table('filters')->insert(['name' => 'حمام واحد', 'group_id' => '18']);
        DB::table('filters')->insert(['name' => 'حمامان', 'group_id' => '18']);
        DB::table('filters')->insert(['name' => 'ثلاث حمامات', 'group_id' => '18']);
        DB::table('filters')->insert(['name' => 'استقبال عادي', 'group_id' => '19']);
        DB::table('filters')->insert(['name' => 'استقبال امريكي', 'group_id' => '19']);

        DB::table('filters')->insert(['name' => 'علوي', 'group_id' => '20']);
        DB::table('filters')->insert(['name' => 'أرضي', 'group_id' => '20']);

        DB::table('filters')->insert(['name' => 'مفروشة', 'group_id' => '21']);
        DB::table('filters')->insert(['name' => 'عادية', 'group_id' => '21']);

        DB::table('filters')->insert(['name' => 'غرفة واحدة', 'group_id' => '22']);
        DB::table('filters')->insert(['name' => 'غرفتين', 'group_id' => '22']);
        DB::table('filters')->insert(['name' => 'ثلاث غرف', 'group_id' => '22']);
        DB::table('filters')->insert(['name' => 'فرد واحد', 'group_id' => '23']);
        DB::table('filters')->insert(['name' => 'فردين', 'group_id' => '23']);
        DB::table('filters')->insert(['name' => 'ثلاث أفراد', 'group_id' => '23']);

        DB::table('filters')->insert(['name' => 'توشيبا', 'group_id' => '24']);
        DB::table('filters')->insert(['name' => 'لينوفو', 'group_id' => '24']);
        DB::table('filters')->insert(['name' => 'ديل', 'group_id' => '24']);
    }
}
