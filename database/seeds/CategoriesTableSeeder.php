<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category 1 level 1
        $category = App\Categories::create(['name_ar' => 'السيارات و المركبات', 'slug' => 'سيارات', 'icon' =>'car', 'photo' => 'front-assets/images/bigcat7.jpg']); // id = 1
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        for($i = 6; $i <= 16; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 1 level 2
        $category = App\Categories::create(['name_ar' => 'السيارات وعربات تخييم', 'parent_id'=>'1']); // id = 2
        // Category 1 level 3
        $category = App\Categories::create(['name_ar' => 'سيارات وعربات النقل', 'parent_id'=>'2']); // id = 3
        $category = App\Categories::create(['name_ar' => 'المقطورات', 'parent_id'=>'2']); // id = 4
        $category = App\Categories::create(['name_ar' => 'عربات سكنية', 'parent_id'=>'2']); // id = 5
        // Category 1 level 2
        $category = App\Categories::create(['name_ar' => 'سيارات البناء ومعدات', 'parent_id'=>'1']); // id = 6
        // Category 1 level 3
        $category = App\Categories::create(['name_ar' => 'ادوات البناء', 'parent_id'=>'6']); // id = 7
        $category = App\Categories::create(['name_ar' => 'مركبات البناء', 'parent_id'=>'6']); // id = 8
        $category = App\Categories::create(['name_ar' => 'معدات وسيارات البناء', 'parent_id'=>'6']); // id = 9
        // Category 1 level 2
        $category = App\Categories::create(['name_ar' => 'معدات وسيارات الزراعة', 'parent_id'=>'1']); // id = 10
        // Category 1 level 3
        $category = App\Categories::create(['name_ar' => 'معدات وماكينات زراعية', 'parent_id'=>'10']); // id = 11
        $category = App\Categories::create(['name_ar' => 'الزراعة والمركبات', 'parent_id'=>'10']); // id = 12
        $category = App\Categories::create(['name_ar' => 'سيارات زراعية ومعدات اخري', 'parent_id'=>'10']); // id = 13
        // Category 1 level 2
        $category = App\Categories::create(['name_ar' => 'الدراجات النارية ودراجات', 'parent_id'=>'1']); // id = 14
        // Category 1 level 3
        $category = App\Categories::create(['name_ar' => 'دراجات نارية', 'parent_id'=>'14']); // id = 15
        $category = App\Categories::create(['name_ar' => 'الدراجات الرباعية', 'parent_id'=>'14']); // id = 16
        $category = App\Categories::create(['name_ar' => 'الدراجات البخارية', 'parent_id'=>'14']); // id = 17
        // Category 1 level 2
        $category = App\Categories::create(['name_ar' => 'قطع غيار واكسسوارات', 'parent_id'=>'1']); // id = 18
        // Category 1 level 3
        $category = App\Categories::create(['name_ar' => 'الصوتيات واجهزة الانذار', 'parent_id'=>'18']); // id = 19
        $category = App\Categories::create(['name_ar' => 'ملاحة السيارات واجهزة الرحلات و البر', 'parent_id'=>'18']); // id = 20
        $category = App\Categories::create(['name_ar' => 'اجزاء جسم السيارات', 'parent_id'=>'18']); // id = 21
        $category = App\Categories::create(['name_ar' => 'الاطارات والجنوط', 'parent_id'=>'18']); // id = 22
        $category = App\Categories::create(['name_ar' => 'اكسسوارات', 'parent_id'=>'18']); // id = 23
        $category = App\Categories::create(['name_ar' => 'اكسسوارات دراجة نارية ورباعية', 'parent_id'=>'18']); // id = 24
        $category = App\Categories::create(['name_ar' => 'قطع غيار محركات النقل', 'parent_id'=>'18']); // id = 25
        $category = App\Categories::create(['name_ar' => 'قطع غيار الدراجات النارية ورباعية', 'parent_id'=>'18']); // id = 26
        $category = App\Categories::create(['name_ar' => 'قطع غيار الشاحنات', 'parent_id'=>'18']); // id = 27
        $category = App\Categories::create(['name_ar' => 'قطع غيار واكسسوارات اخري', 'parent_id'=>'18']); // id = 28
        $category = App\Categories::create(['name_ar' => 'مقطورة', 'parent_id'=>'18']); // id = 29
        // Category 1 level 2
        $category = App\Categories::create(['name_ar' => 'تشليح', 'parent_id'=>'1']); // id = 30
        // Category 1 level 2
        $category = App\Categories::create(['name_ar' => 'الشاحنات', 'parent_id'=>'1']); // id = 31
        // Category 1 level 3
        $category = App\Categories::create(['name_ar' => 'الشاحنات', 'parent_id'=>'31']); // id = 32
        // Category 1 level 2
        $category = App\Categories::create(['name_ar' => 'محركات النقل الاخري', 'parent_id'=>'1']); // id = 33



        // Category 2 level 1
        $category = App\Categories::create(['name_ar' => 'قوارب والدراجات المائية', 'slug' => 'قوارب', 'icon' =>'ship', 'photo' => 'front-assets/images/bigcat8.jpg']); // id = 34
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 2 level 2
        $category = App\Categories::create(['name_ar' => 'الدراجات المائية', 'parent_id'=>'34']); // id = 35
        $category = App\Categories::create(['name_ar' => 'الزوارق والتجديف', 'parent_id'=>'34']); // id = 36
        $category = App\Categories::create(['name_ar' => 'الزوارق السريعة والبخارية', 'parent_id'=>'34']); // id = 37
        $category = App\Categories::create(['name_ar' => 'زوارق الشراع', 'parent_id'=>'34']); // id = 38
        $category = App\Categories::create(['name_ar' => 'القوارب البلاستيكية وقوارب التجول', 'parent_id'=>'34']); // id = 39
        $category = App\Categories::create(['name_ar' => 'اكسسوارات وقطع غيار للقوارب والدراجات المائية', 'parent_id'=>'34']); // id = 40
        $category = App\Categories::create(['name_ar' => 'الزوارق والدراجات المائية الاخرى', 'parent_id'=>'34']); // id = 41
        
        


        // Category 3 level 1
        $category = App\Categories::create(['name_ar' => 'اطفال ورضع', 'slug' => 'اطفال','icon' =>'child', 'photo' => 'front-assets/images/bigcat9.jpg']); // id = 42
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 3 level 2
        $category = App\Categories::create(['name_ar' => 'حامل اطفال', 'parent_id'=>'42']); // id = 43
        $category = App\Categories::create(['name_ar' => 'الاستحمام', 'parent_id'=>'42']); // id = 44
        $category = App\Categories::create(['name_ar' => 'اسرة اطفال', 'parent_id'=>'42']); // id = 45
        $category = App\Categories::create(['name_ar' => 'تغذية', 'parent_id'=>'42']); // id = 46
        $category = App\Categories::create(['name_ar' => 'ملابس الرضع', 'parent_id'=>'42']); // id = 47
        $category = App\Categories::create(['name_ar' => 'ملابس اطفال', 'parent_id'=>'42']); // id = 48
        $category = App\Categories::create(['name_ar' => 'ملابس الامومة', 'parent_id'=>'42']); // id = 49
        $category = App\Categories::create(['name_ar' => 'اللعب – داخلي', 'parent_id'=>'42']); // id = 50
        $category = App\Categories::create(['name_ar' => 'اللعب – في الخارج', 'parent_id'=>'42']); // id = 51
        $category = App\Categories::create(['name_ar' => 'عربات الاطفال', 'parent_id'=>'42']); // id = 52
        $category = App\Categories::create(['name_ar' => 'اطفال ورضع اخري', 'parent_id'=>'42']); // id = 53
        $category = App\Categories::create(['name_ar' => 'امان وسلامة', 'parent_id'=>'42']); // id = 54
        // Category 3 level 3
        $category = App\Categories::create(['name_ar' => 'مقاعد السيارة', 'parent_id'=>'54']); // id = 55
        $category = App\Categories::create(['name_ar' => 'اجهزة المراقبة', 'parent_id'=>'54']); // id = 56
        $category = App\Categories::create(['name_ar' => 'حواجز وبوابات امان الاطفال', 'parent_id'=>'54']); // id = 57
        $category = App\Categories::create(['name_ar' => 'الأمان والسلامة الأخرى', 'parent_id'=>'54']); // id = 58



        // Category 4 level 1
        $category = App\Categories::create(['name_ar' => 'الملابس والمجوهرات والمستحضرات', 'slug' => 'ملابس و مجوهرات','icon' =>'diamond' , 'photo' => 'front-assets/images/bigcat1.jpg']); // id = 59
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 4 level 2
        $category = App\Categories::create(['name_ar' => 'اكسسوارات', 'parent_id'=>'59']); // id = 60
        $category = App\Categories::create(['name_ar' => 'حقائب', 'parent_id'=>'59']); // id = 61
        $category = App\Categories::create(['name_ar' => 'عطور', 'parent_id'=>'59']); // id = 62
        $category = App\Categories::create(['name_ar' => 'مستحضرات العناية بالجسم', 'parent_id'=>'59']); // id = 63
        $category = App\Categories::create(['name_ar' => 'مستحضرات تجميلية', 'parent_id'=>'59']); // id = 64
        $category = App\Categories::create(['name_ar' => 'مجوهرات', 'parent_id'=>'59']); // id = 65
        // Category 4 level 3
        $category = App\Categories::create(['name_ar' => 'ساعات', 'parent_id'=>'65']); // id = 66
        $category = App\Categories::create(['name_ar' => 'مجوهرات للرجال', 'parent_id'=>'65']); // id = 67
        $category = App\Categories::create(['name_ar' => 'مجوهرات نسائية', 'parent_id'=>'65']); // id = 68
        $category = App\Categories::create(['name_ar' => 'مجوهرات للجنسين', 'parent_id'=>'65']); // id = 69
        $category = App\Categories::create(['name_ar' => 'مجوهرات اخري', 'parent_id'=>'65']); // id = 70
        // Category 4 level 2
        $category = App\Categories::create(['name_ar' => 'ملابس رجالية', 'parent_id'=>'59']); // id = 71
        // Category 4 level 3
        $category = App\Categories::create(['name_ar' => 'ثياب ومشالح و دقلات', 'parent_id'=>'71']); // id = 72
        $category = App\Categories::create(['name_ar' => 'جاكيتات ومعاطف', 'parent_id'=>'71']); // id = 73
        $category = App\Categories::create(['name_ar' => 'البناطيل والجينز', 'parent_id'=>'71']); // id = 74
        $category = App\Categories::create(['name_ar' => 'ملابس رياضية', 'parent_id'=>'71']); // id = 75
        $category = App\Categories::create(['name_ar' => 'بلايز وقمصان وتي شيرت', 'parent_id'=>'71']); // id = 76
        $category = App\Categories::create(['name_ar' => 'احذية رجالية', 'parent_id'=>'71']); // id = 77
        // Category 4 level 2
        $category = App\Categories::create(['name_ar' => 'ملابس نسائية', 'parent_id'=>'59']); // id = 78
        // Category 4 level 3
        $category = App\Categories::create(['name_ar' => 'فساتين وتنانير', 'parent_id'=>'78']); // id = 79
        $category = App\Categories::create(['name_ar' => 'جاكيتات ومعاطف', 'parent_id'=>'78']); // id = 80
        $category = App\Categories::create(['name_ar' => 'البناطيل والجينز', 'parent_id'=>'78']); // id = 81
        $category = App\Categories::create(['name_ar' => 'الجوارب والملابس الداخلية', 'parent_id'=>'78']); // id = 82
        $category = App\Categories::create(['name_ar' => 'ملابس رياضية', 'parent_id'=>'78']); // id = 83
        $category = App\Categories::create(['name_ar' => 'بلايز وقمصان وتي شيرت', 'parent_id'=>'78']); // id = 84
        $category = App\Categories::create(['name_ar' => 'فساتين زواج', 'parent_id'=>'78']); // id = 85
        $category = App\Categories::create(['name_ar' => 'عبايات', 'parent_id'=>'78']); // id = 86
        $category = App\Categories::create(['name_ar' => 'جلابيات', 'parent_id'=>'78']); // id = 87
        $category = App\Categories::create(['name_ar' => 'ملابس نسائية اخري', 'parent_id'=>'78']); // id = 88
        $category = App\Categories::create(['name_ar' => 'احذية المرأة', 'parent_id'=>'78']); // id = 89




        // Category 5 level 1
        $category = App\Categories::create(['name_ar' => 'السفر و السياحة', 'slug' => 'سفر', 'icon' =>'ship', 'photo' => 'front-assets/images/bigcat10.jpg']); // id = 90
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 5 level 2
        $category = App\Categories::create(['name_ar' => 'فنادق', 'parent_id'=>'90']); // id = 91
        $category = App\Categories::create(['name_ar' => 'شقق مفروشة', 'parent_id'=>'90']); // id = 92
        for($i = 21; $i <= 23; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id , 'filters_groups_id' => $i]);
        $category = App\Categories::create(['name_ar' => 'وكالات سياحية', 'parent_id'=>'90']); // id = 93
        $category = App\Categories::create(['name_ar' => 'رحلات جماعية', 'parent_id'=>'90']); // id = 94




        // Category 6 level 1
        $category = App\Categories::create(['name_ar' => 'مطاعم وكافيهات ومخبوزات', 'slug' => 'مطعم', 'icon' =>'cutlery', 'photo' => 'front-assets/images/bigcat11.jpg']); // id = 95
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 6 level 2
        $category = App\Categories::create(['name_ar' => 'مطاعم وكافيه', 'parent_id'=>'95']); // id = 96
        $category = App\Categories::create(['name_ar' => 'مخابز وحلويات', 'parent_id'=>'95']); // id = 97
        $category = App\Categories::create(['name_ar' => 'عربات الطعام', 'parent_id'=>'95']); // id = 98
        $category = App\Categories::create(['name_ar' => 'مأكولات من المنزل', 'parent_id'=>'95']); // id = 99




        

        // Category 7 level 1
        $category = App\Categories::create(['name_ar' => 'المجتمع والترفية', 'slug' => 'مجتمع', 'icon' =>'users', 'photo' => 'front-assets/images/bigcat12.jpg']); // id = 100
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 7 level 2
        $category = App\Categories::create(['name_ar' => 'فعاليات ومعارض', 'parent_id'=>'100']); // id = 101
        $category = App\Categories::create(['name_ar' => 'الانشطة والهوايات', 'parent_id'=>'100']); // id = 102
        $category = App\Categories::create(['name_ar' => 'العمل التطوعي', 'parent_id'=>'100']); // id = 103
        $category = App\Categories::create(['name_ar' => 'الصفوف المهارية والتعليمية', 'parent_id'=>'100']); // id = 104
        $category = App\Categories::create(['name_ar' => 'مدربين شخصيين', 'parent_id'=>'100']); // id = 105
        $category = App\Categories::create(['name_ar' => 'التبادل اللغوي', 'parent_id'=>'100']); // id = 106
        $category = App\Categories::create(['name_ar' => 'المفقودات والموجودات', 'parent_id'=>'100']); // id = 107
        $category = App\Categories::create(['name_ar' => 'شركاء الرياضة', 'parent_id'=>'100']); // id = 108
        $category = App\Categories::create(['name_ar' => 'اجتماعية وترفيه اخري', 'parent_id'=>'100']); // id = 109



        // Category 8 level 1
        $category = App\Categories::create(['name_ar' => 'كتب والعاب', 'slug' => 'كتب والعاب','icon' =>'book', 'photo' => 'front-assets/images/bigcat13.jpg']); // id = 110
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 8 level 2
        $category = App\Categories::create(['name_ar' => 'كتب', 'parent_id'=>'110']); // id = 111
        // Category 8 level 3
        $category = App\Categories::create(['name_ar' => 'كتب اطفال', 'parent_id'=>'111']); // id = 112
        $category = App\Categories::create(['name_ar' => 'كتب اسلامية', 'parent_id'=>'111']); // id = 113
        $category = App\Categories::create(['name_ar' => 'الروايات', 'parent_id'=>'111']); // id = 114
        $category = App\Categories::create(['name_ar' => 'روايات مصورة', 'parent_id'=>'111']); // id = 115
        $category = App\Categories::create(['name_ar' => 'مجلات', 'parent_id'=>'111']); // id = 116
        $category = App\Categories::create(['name_ar' => 'تطوير الذات', 'parent_id'=>'111']); // id = 117
        $category = App\Categories::create(['name_ar' => 'الكتب الدراسية', 'parent_id'=>'111']); // id = 118
        $category = App\Categories::create(['name_ar' => 'الأدلة السياحية وادب الرحلات', 'parent_id'=>'111']); // id = 119
        $category = App\Categories::create(['name_ar' => 'كتب اخري', 'parent_id'=>'111']); // id = 120
        $category = App\Categories::create(['name_ar' => 'الاقراص المدمجة واقراص الفيديو الرقمية', 'parent_id'=>'111']); // id = 121
        // Category 8 level 2
        $category = App\Categories::create(['name_ar' => 'العاب الذكاء', 'parent_id'=>'110']); // id = 122





        // Category 9 level 1
        $category = App\Categories::create(['name_ar' => 'وظائف', 'slug' => 'وظيفه', 'icon' => 'briefcase', 'photo' => 'front-assets/images/bigcat14.jpg']); // id = 123
        for($i = 1; $i <= 5; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 9 level 2
        $category = App\Categories::create(['name_ar' => 'محاسبة', 'parent_id'=>'123']); // id = 124
        $category = App\Categories::create(['name_ar' => 'مساعد اداري', 'parent_id'=>'123']); // id = 125
        $category = App\Categories::create(['name_ar' => 'سكرتارية', 'parent_id'=>'123']); // id = 126
        $category = App\Categories::create(['name_ar' => 'الاستقبال', 'parent_id'=>'123']); // id = 127
        $category = App\Categories::create(['name_ar' => 'كاتب وصحفي', 'parent_id'=>'123']); // id = 128
        $category = App\Categories::create(['name_ar' => 'مخطط مالي', 'parent_id'=>'123']); // id = 129
        $category = App\Categories::create(['name_ar' => 'اداره الاموال والثروات', 'parent_id'=>'123']); // id = 130
        $category = App\Categories::create(['name_ar' => 'خدمة العملاء – مركز الاتصالات', 'parent_id'=>'123']); // id = 131
        $category = App\Categories::create(['name_ar' => 'المبيعات والتسويق - مركز اتصالات', 'parent_id'=>'123']); // id = 132
        $category = App\Categories::create(['name_ar' => 'المبيعات والتسويق – مقابلة العملاء', 'parent_id'=>'123']); // id = 133
        $category = App\Categories::create(['name_ar' => 'رعاية وتعليم كبار السن وذوي الاحتياجات الخاصة', 'parent_id'=>'123']); // id = 134
        $category = App\Categories::create(['name_ar' => 'مشرف او مقاول', 'parent_id'=>'123']); // id = 135
        $category = App\Categories::create(['name_ar' => 'مشغل الآلات', 'parent_id'=>'123']); // id = 136
        $category = App\Categories::create(['name_ar' => 'جرافيك ديزاين', 'parent_id'=>'123']); // id = 137
        $category = App\Categories::create(['name_ar' => 'هندسة معمارية', 'parent_id'=>'123']); // id = 138
        $category = App\Categories::create(['name_ar' => 'تصميم المواقع والتداخلات', 'parent_id'=>'123']); // id = 139
        $category = App\Categories::create(['name_ar' => 'التصميم الداخلي', 'parent_id'=>'123']); // id = 140
        $category = App\Categories::create(['name_ar' => 'رعاية الاطفال ورعاية ما بعد المدرسة', 'parent_id'=>'123']); // id = 141
        $category = App\Categories::create(['name_ar' => 'مدرسين', 'parent_id'=>'123']); // id = 142
        $category = App\Categories::create(['name_ar' => 'مهندس مركبات', 'parent_id'=>'123']); // id = 143
        $category = App\Categories::create(['name_ar' => 'مهندس خدمات البناء', 'parent_id'=>'123']); // id = 144
        $category = App\Categories::create(['name_ar' => 'هندسة ميكانيكية', 'parent_id'=>'123']); // id = 145
        $category = App\Categories::create(['name_ar' => 'مهندس كهربائي', 'parent_id'=>'123']); // id = 146
        $category = App\Categories::create(['name_ar' => 'الهندسة الزراعية وخدمات الزراعة', 'parent_id'=>'123']); // id = 147
        $category = App\Categories::create(['name_ar' => 'تدريب الحيوانات / مدرب', 'parent_id'=>'123']); // id = 148
        $category = App\Categories::create(['name_ar' => 'طبيب', 'parent_id'=>'123']); // id = 149
        $category = App\Categories::create(['name_ar' => 'سكرتير طبي', 'parent_id'=>'123']); // id = 150
        $category = App\Categories::create(['name_ar' => 'صيدلاني', 'parent_id'=>'123']); // id = 151
        $category = App\Categories::create(['name_ar' => 'العلاج الطبيعي واعادة التأهيل', 'parent_id'=>'123']); // id = 152
        $category = App\Categories::create(['name_ar' => 'مضيفي المأكولات والمشروبات', 'parent_id'=>'123']); // id = 153
        $category = App\Categories::create(['name_ar' => 'طباخين', 'parent_id'=>'123']); // id = 154
        $category = App\Categories::create(['name_ar' => 'مرشد سياحي', 'parent_id'=>'123']); // id = 155
        $category = App\Categories::create(['name_ar' => 'مطور/ مبرمج تقنية المعلومات والاتصالات', 'parent_id'=>'123']); // id = 156
        $category = App\Categories::create(['name_ar' => 'الدعم التقني والمساندة', 'parent_id'=>'123']); // id = 157
        $category = App\Categories::create(['name_ar' => 'محلل انظمة / اعمال', 'parent_id'=>'123']); // id = 158
        $category = App\Categories::create(['name_ar' => 'منتج ومطور مواقع', 'parent_id'=>'123']); // id = 159
        $category = App\Categories::create(['name_ar' => 'محامون ومستشارون', 'parent_id'=>'123']); // id = 160
        $category = App\Categories::create(['name_ar' => 'السكرتارية القانونية', 'parent_id'=>'123']); // id = 161
        $category = App\Categories::create(['name_ar' => 'سائقين', 'parent_id'=>'123']); // id = 162
        $category = App\Categories::create(['name_ar' => 'اداره الفعاليات / مدير فعاليات', 'parent_id'=>'123']); // id = 163
        $category = App\Categories::create(['name_ar' => 'مصورين', 'parent_id'=>'123']); // id = 164
        $category = App\Categories::create(['name_ar' => 'العلاقات العامة', 'parent_id'=>'123']); // id = 165
        $category = App\Categories::create(['name_ar' => 'مستشار واختصاصين موارد بشريه', 'parent_id'=>'123']); // id = 166
        $category = App\Categories::create(['name_ar' => 'التدريب والتطوير / مدرب مطور مهارات', 'parent_id'=>'123']); // id = 167
        $category = App\Categories::create(['name_ar' => 'مدرب رياضي', 'parent_id'=>'123']); // id = 168
        $category = App\Categories::create(['name_ar' => 'فني التكيف والتبريد', 'parent_id'=>'123']); // id = 169
        $category = App\Categories::create(['name_ar' => 'الخبازين وصانعي الحلويات', 'parent_id'=>'123']); // id = 170
        $category = App\Categories::create(['name_ar' => 'الجزارين', 'parent_id'=>'123']); // id = 171
        $category = App\Categories::create(['name_ar' => 'النجارين وصانعي الخزائن', 'parent_id'=>'123']); // id = 172
        $category = App\Categories::create(['name_ar' => 'التنظيف وعاملات المنزل', 'parent_id'=>'123']); // id = 173
        $category = App\Categories::create(['name_ar' => 'كهربائي', 'parent_id'=>'123']); // id = 174
        $category = App\Categories::create(['name_ar' => 'منسق زهور', 'parent_id'=>'123']); // id = 175
        $category = App\Categories::create(['name_ar' => 'كوافيره', 'parent_id'=>'123']); // id = 176
        $category = App\Categories::create(['name_ar' => 'عامل', 'parent_id'=>'123']); // id = 177
        $category = App\Categories::create(['name_ar' => 'حلاق', 'parent_id'=>'123']); // id = 178
        $category = App\Categories::create(['name_ar' => 'ميك اب ارتست', 'parent_id'=>'123']); // id = 179
        $category = App\Categories::create(['name_ar' => 'جليسة اطفال ومربية اطفال', 'parent_id'=>'123']); // id = 180
        $category = App\Categories::create(['name_ar' => 'خطاط وكاتب لوحات', 'parent_id'=>'123']); // id = 181
        $category = App\Categories::create(['name_ar' => 'سباك', 'parent_id'=>'123']); // id = 182
        $category = App\Categories::create(['name_ar' => 'دهان', 'parent_id'=>'123']); // id = 183
        $category = App\Categories::create(['name_ar' => 'عامل ديكور وجبس', 'parent_id'=>'123']); // id = 184
        $category = App\Categories::create(['name_ar' => 'حارس أمن', 'parent_id'=>'123']); // id = 185
        $category = App\Categories::create(['name_ar' => 'خياط', 'parent_id'=>'123']); // id = 186
        $category = App\Categories::create(['name_ar' => 'وظائف اخرى', 'parent_id'=>'123']); // id = 187




        // Category 10 level 1
        $category = App\Categories::create(['name_ar' => 'تذاكر', 'slug' => 'تذاكر', 'icon' => 'ticket', 'photo' => 'front-assets/images/bigcat5.jpg']); // id = 188
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 10 level 2
        $category = App\Categories::create(['name_ar' => 'الحافلات والقطارات والطائرة', 'parent_id'=>'188']); // id = 189
        $category = App\Categories::create(['name_ar' => 'فعاليات ومعارض', 'parent_id'=>'188']); // id = 190
        $category = App\Categories::create(['name_ar' => 'رياضة', 'parent_id'=>'188']); // id = 191
        $category = App\Categories::create(['name_ar' => 'تذاكر اخري', 'parent_id'=>'188']); // id = 192




        // Category 11 level 1
        $category = App\Categories::create(['name_ar' => 'المنزل والحديقة', 'slug' => 'منزل','icon' =>'home', 'photo' => 'front-assets/images/bigcat2.jpg']); // id = 193
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 11 level 2
        $category = App\Categories::create(['name_ar' => 'الاجهزة', 'parent_id'=>'193']); // id = 194
        // Category 11 level 3
        $category = App\Categories::create(['name_ar' => 'الخلاطات، عصارات', 'parent_id'=>'194']); // id = 195
        $category = App\Categories::create(['name_ar' => 'ماكينات القهوة', 'parent_id'=>'194']); // id = 196
        $category = App\Categories::create(['name_ar' => 'بوتاجازات وافران', 'parent_id'=>'194']); // id = 197
        $category = App\Categories::create(['name_ar' => 'غسالات الصحون', 'parent_id'=>'194']); // id = 198
        $category = App\Categories::create(['name_ar' => 'ثلاجات ومجمدات', 'parent_id'=>'194']); // id = 199
        $category = App\Categories::create(['name_ar' => 'تدفئة وتكييف', 'parent_id'=>'194']); // id = 200
        $category = App\Categories::create(['name_ar' => 'ميكروويف', 'parent_id'=>'194']); // id = 201
        $category = App\Categories::create(['name_ar' => 'غسالات ومجففات', 'parent_id'=>'194']); // id = 202
        $category = App\Categories::create(['name_ar' => 'الات الخياطة', 'parent_id'=>'194']); // id = 203
        $category = App\Categories::create(['name_ar' => 'اجهزة صغيرة', 'parent_id'=>'194']); // id = 204
        $category = App\Categories::create(['name_ar' => 'مكانس كهربائية', 'parent_id'=>'194']); // id = 205
        $category = App\Categories::create(['name_ar' => 'اجهزة اخري', 'parent_id'=>'194']); // id = 206
        // Category 11 level 2
        $category = App\Categories::create(['name_ar' => 'مواد بناء والادوات الصحية', 'parent_id'=>'193']); // id = 207
        $category = App\Categories::create(['name_ar' => 'اثاث المنزل', 'parent_id'=>'193']); // id = 208
        // Category 11 level 3
        $category = App\Categories::create(['name_ar' => 'الكراسي', 'parent_id'=>'208']); // id = 209
        $category = App\Categories::create(['name_ar' => 'أسرة', 'parent_id'=>'208']); // id = 210
        $category = App\Categories::create(['name_ar' => 'طاولات السرير', 'parent_id'=>'208']); // id = 211
        $category = App\Categories::create(['name_ar' => 'خزائن الكتب ورفوف', 'parent_id'=>'208']); // id = 212
        $category = App\Categories::create(['name_ar' => 'البوفيهات والطاولات الجانبية', 'parent_id'=>'208']); // id = 213
        $category = App\Categories::create(['name_ar' => 'وحدات التخزين', 'parent_id'=>'208']); // id = 214
        $category = App\Categories::create(['name_ar' => 'كراسي الطعام', 'parent_id'=>'208']); // id = 215
        $category = App\Categories::create(['name_ar' => 'طاولات قهوة', 'parent_id'=>'208']); // id = 216
        $category = App\Categories::create(['name_ar' => 'مكاتب', 'parent_id'=>'208']); // id = 217
        $category = App\Categories::create(['name_ar' => 'تسريحه وادراج', 'parent_id'=>'208']); // id = 218
        $category = App\Categories::create(['name_ar' => 'وحدات تلفاز وترفيه', 'parent_id'=>'208']); // id = 219
        $category = App\Categories::create(['name_ar' => 'مرايا', 'parent_id'=>'208']); // id = 220
        $category = App\Categories::create(['name_ar' => 'كراسي مكتب', 'parent_id'=>'208']); // id = 221
        $category = App\Categories::create(['name_ar' => 'الارائك', 'parent_id'=>'208']); // id = 222
        $category = App\Categories::create(['name_ar' => 'طاولات الطعام', 'parent_id'=>'208']); // id = 223
        $category = App\Categories::create(['name_ar' => 'خزائن', 'parent_id'=>'208']); // id = 224
        $category = App\Categories::create(['name_ar' => 'اثاث اخري', 'parent_id'=>'208']); // id = 225
        // Category 11 level 2
        $category = App\Categories::create(['name_ar' => 'حديقة', 'parent_id'=>'193']); // id = 226
        // Category 11 level 3
        $category = App\Categories::create(['name_ar' => 'الات وادوات الشواء', 'parent_id'=>'226']); // id = 227
        $category = App\Categories::create(['name_ar' => 'الات جز العشب', 'parent_id'=>'226']); // id = 228
        $category = App\Categories::create(['name_ar' => 'اثاث الحديقة والاسترخاء', 'parent_id'=>'226']); // id = 229
        $category = App\Categories::create(['name_ar' => 'اثاث طعام خارجي', 'parent_id'=>'226']); // id = 230
        $category = App\Categories::create(['name_ar' => 'المظلات والسواتر', 'parent_id'=>'226']); // id = 231
        $category = App\Categories::create(['name_ar' => 'النباتات', 'parent_id'=>'226']); // id = 232
        $category = App\Categories::create(['name_ar' => 'حوض السباحة', 'parent_id'=>'226']); // id = 233
        $category = App\Categories::create(['name_ar' => 'احواض واوعية النباتات', 'parent_id'=>'226']); // id = 234
        $category = App\Categories::create(['name_ar' => 'ادوات تخزين', 'parent_id'=>'226']); // id = 235
        $category = App\Categories::create(['name_ar' => 'ادوات حديقة اخري', 'parent_id'=>'226']); // id = 236
        // Category 11 level 2
        $category = App\Categories::create(['name_ar' => 'ديكور المنزل', 'parent_id'=>'193']); // id = 237
        // Category 11 level 3
        $category = App\Categories::create(['name_ar' => 'الساعات', 'parent_id'=>'237']); // id = 238
        $category = App\Categories::create(['name_ar' => 'اكسسوارات ديكور', 'parent_id'=>'237']); // id = 239
        $category = App\Categories::create(['name_ar' => 'اطارت الصور', 'parent_id'=>'237']); // id = 240
        $category = App\Categories::create(['name_ar' => 'المزهريات والفازات', 'parent_id'=>'237']); // id = 241
        $category = App\Categories::create(['name_ar' => 'ستائر', 'parent_id'=>'237']); // id = 242
        $category = App\Categories::create(['name_ar' => 'سجاد', 'parent_id'=>'237']); // id = 243
        $category = App\Categories::create(['name_ar' => 'المفارش والمنسوجات', 'parent_id'=>'237']); // id = 244
        $category = App\Categories::create(['name_ar' => 'غيرها من ديكور المنزل', 'parent_id'=>'237']); // id = 245
        // Category 11 level 2
        $category = App\Categories::create(['name_ar' => 'مطبخ وغرفة الطعام', 'parent_id'=>'193']); // id = 246
        // Category 11 level 3
        $category = App\Categories::create(['name_ar' => 'مطابخ', 'parent_id'=>'246']); // id = 247
        $category = App\Categories::create(['name_ar' => 'اكسسوارات الطبخ', 'parent_id'=>'246']); // id = 248
        $category = App\Categories::create(['name_ar' => 'ادوات المائدة', 'parent_id'=>'246']); // id = 249
        $category = App\Categories::create(['name_ar' => 'اواني الطعام', 'parent_id'=>'246']); // id = 250
        $category = App\Categories::create(['name_ar' => 'الاواني والمقالي', 'parent_id'=>'246']); // id = 251
        $category = App\Categories::create(['name_ar' => 'ادوات مطبخ اخري', 'parent_id'=>'246']); // id = 252
        // Category 11 level 2
        $category = App\Categories::create(['name_ar' => 'إضاءة', 'parent_id'=>'193']); // id = 253
        // Category 11 level 3
        $category = App\Categories::create(['name_ar' => 'اضاءة الاسقف', 'parent_id'=>'253']); // id = 254
        $category = App\Categories::create(['name_ar' => 'اضاءة الارضية', 'parent_id'=>'253']); // id = 255
        $category = App\Categories::create(['name_ar' => 'إضاءة خارجية', 'parent_id'=>'253']); // id = 256
        $category = App\Categories::create(['name_ar' => 'مصابيح مكتب', 'parent_id'=>'253']); // id = 257
        $category = App\Categories::create(['name_ar' => 'إضاءة اخري', 'parent_id'=>'253']); // id = 258
        // Category 11 level 2
        $category = App\Categories::create(['name_ar' => 'عدد وادوات', 'parent_id'=>'193']); // id = 259
        // Category 11 level 3
        $category = App\Categories::create(['name_ar' => 'ادوات الحدائق', 'parent_id'=>'259']); // id = 260
        $category = App\Categories::create(['name_ar' => 'ادوات يدوية', 'parent_id'=>'259']); // id = 261
        $category = App\Categories::create(['name_ar' => 'سلالم', 'parent_id'=>'259']); // id = 262
        $category = App\Categories::create(['name_ar' => 'ادوات التخزين ومقاعد', 'parent_id'=>'259']); // id = 263
        $category = App\Categories::create(['name_ar' => 'ادوات كهربائية', 'parent_id'=>'259']); // id = 264
        $category = App\Categories::create(['name_ar' => 'عدد وادوات اخري', 'parent_id'=>'259']); // id = 265
        // Category 11 level 2
        $category = App\Categories::create(['name_ar' => 'باقي المنزل والحديقة', 'parent_id'=>'193']); // id = 266


        // Category 12 level 1
        $category = App\Categories::create(['name_ar' => 'التحف والفنون والمقتنيات', 'slug' => 'التحف','icon' =>'picture-o', 'photo' => 'front-assets/images/bigcat15.jpg']); // id = 267
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 12 level 2
        $category = App\Categories::create(['name_ar' => 'التحف', 'parent_id'=>'267']); // id = 268
        $category = App\Categories::create(['name_ar' => 'فنون', 'parent_id'=>'267']); // id = 269
        $category = App\Categories::create(['name_ar' => 'مقتنيات', 'parent_id'=>'267']); // id = 270
        $category = App\Categories::create(['name_ar' => 'تحف وفنون ومقتنيات اخري', 'parent_id'=>'267']); // id = 271



        // Category 13 level 1
        $category = App\Categories::create(['name_ar' => 'الإلكترونيات و الكمبيوتر', 'slug' => 'الإلكترونيات', 'icon' => 'desktop', 'photo' => 'front-assets/images/bigcat16.jpg']); // id = 272
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => 24]);
        // Category 13 level 2
        $category = App\Categories::create(['name_ar' => 'صوتيات', 'parent_id'=>'272']); // id = 273
        // Category 13 level 3
        $category = App\Categories::create(['name_ar' => 'سماعات الرأس وسماعات', 'parent_id'=>'273']); // id = 274
        $category = App\Categories::create(['name_ar' => 'MP3مشغلات', 'parent_id'=>'273']); // id = 275
        $category = App\Categories::create(['name_ar' => 'اجهزة الراديو واجهزة استقبال', 'parent_id'=>'273']); // id = 276
        $category = App\Categories::create(['name_ar' => 'مكبرات الصوت', 'parent_id'=>'273']); // id = 277
        $category = App\Categories::create(['name_ar' => 'انظمة ستيريو', 'parent_id'=>'273']); // id = 278
        $category = App\Categories::create(['name_ar' => 'الصوتيات الأخرى', 'parent_id'=>'273']); // id = 279
        // Category 13 level 2
        $category = App\Categories::create(['name_ar' => 'كاميرات', 'parent_id'=>'272']); // id = 280
        // Category 13 level 3
        $category = App\Categories::create(['name_ar' => 'كاميرات الحركة و GoPro', 'parent_id'=>'280']); // id = 281
        $category = App\Categories::create(['name_ar' => 'العدسات', 'parent_id'=>'280']); // id = 282
        $category = App\Categories::create(['name_ar' => 'ملحقات كاميرا رقمية', 'parent_id'=>'280']); // id = 283
        $category = App\Categories::create(['name_ar' => 'الكاميرات الرقمية المدمجة', 'parent_id'=>'280']); // id = 284
        $category = App\Categories::create(['name_ar' => 'SLRالرقمية', 'parent_id'=>'280']); // id = 285
        $category = App\Categories::create(['name_ar' => 'كاميرات الفيديو', 'parent_id'=>'280']); // id = 286
        $category = App\Categories::create(['name_ar' => 'اكسسوارات كاميرات الفيديو', 'parent_id'=>'280']); // id = 287
        $category = App\Categories::create(['name_ar' => 'كاميرات اخري', 'parent_id'=>'280']); // id = 288
        // Category 13 level 2
        $category = App\Categories::create(['name_ar' => 'كمبيوتر وبرامج', 'parent_id'=>'272']); // id = 289
        // Category 13 level 3
        $category = App\Categories::create(['name_ar' => 'المكونات', 'parent_id'=>'289']); // id = 290
        $category = App\Categories::create(['name_ar' => 'اجهزة الكمبيوتر المكتبية', 'parent_id'=>'289']); // id = 291
        $category = App\Categories::create(['name_ar' => 'اكسسوارات الكمبيوتر', 'parent_id'=>'289']); // id = 292
        $category = App\Categories::create(['name_ar' => 'اجهزة الكمبيوتر المحمولة', 'parent_id'=>'289']); // id = 293
        $category = App\Categories::create(['name_ar' => 'اجهزة المودم والموجهات', 'parent_id'=>'289']); // id = 294
        $category = App\Categories::create(['name_ar' => 'شاشات الكمبيوتر', 'parent_id'=>'289']); // id = 295
        $category = App\Categories::create(['name_ar' => 'طابعات وماسحات ضوئية', 'parent_id'=>'289']); // id = 296
        $category = App\Categories::create(['name_ar' => 'البرمجيات', 'parent_id'=>'289']); // id = 297
        $category = App\Categories::create(['name_ar' => 'سماعات الكمبيوتر', 'parent_id'=>'289']); // id = 298
        $category = App\Categories::create(['name_ar' => 'وحدات التخزين USB والهارد ديسك', 'parent_id'=>'289']); // id = 299
        $category = App\Categories::create(['name_ar' => 'كمبيوتر وبرامج اخري', 'parent_id'=>'289']); // id = 300
        // Category 13 level 2
        $category = App\Categories::create(['name_ar' => 'الالكترونيات واجهزة الكمبيوتر الأخرى', 'parent_id'=>'272']); // id = 301
        $category = App\Categories::create(['name_ar' => 'الهواتف', 'parent_id'=>'272']); // id = 302
        // Category 13 level 3
        $category = App\Categories::create(['name_ar' => 'ايفون', 'parent_id'=>'302']); // id = 303
        $category = App\Categories::create(['name_ar' => 'هواتف الاندرويد', 'parent_id'=>'302']); // id = 304
        $category = App\Categories::create(['name_ar' => 'الهواتف المنزلية', 'parent_id'=>'302']); // id = 305
        $category = App\Categories::create(['name_ar' => 'ملحقات الهاتف', 'parent_id'=>'302']); // id = 306
        $category = App\Categories::create(['name_ar' => 'الهواتف الأخري', 'parent_id'=>'302']); // id = 307
        // Category 13 level 2
        $category = App\Categories::create(['name_ar' => 'الاجهزة اللوحية والكتب الاليكتروني', 'parent_id'=>'272']); // id = 308
        // Category 13 level 3
        $category = App\Categories::create(['name_ar' => 'اجهزة الاندرويد اللوحية', 'parent_id'=>'308']); // id = 309
        $category = App\Categories::create(['name_ar' => 'الايباد', 'parent_id'=>'308']); // id = 310
        $category = App\Categories::create(['name_ar' => 'كندل وكتب اليكترونية', 'parent_id'=>'308']); // id = 311
        $category = App\Categories::create(['name_ar' => 'اكسسوارات الاجهزة اللوحية', 'parent_id'=>'308']); // id = 312
        $category = App\Categories::create(['name_ar' => 'الاجهزة اللوحية الأخرى', 'parent_id'=>'308']); // id = 313
        // Category 13 level 2
        $category = App\Categories::create(['name_ar' => 'مشغلات تلفزيونية ودي في دي', 'parent_id'=>'272']); // id = 314
        // Category 13 level 3
        $category = App\Categories::create(['name_ar' => 'تلفزيونات', 'parent_id'=>'314']); // id = 315
        $category = App\Categories::create(['name_ar' => 'مشغل فيديو', 'parent_id'=>'314']); // id = 316
        $category = App\Categories::create(['name_ar' => 'انظمة المسرح المنزلي', 'parent_id'=>'314']); // id = 317
        $category = App\Categories::create(['name_ar' => 'اكسسوارات تليفزيون', 'parent_id'=>'314']); // id = 318
        $category = App\Categories::create(['name_ar' => 'مشغلات الأخرى', 'parent_id'=>'314']); // id = 319
        // Category 13 level 2
        $category = App\Categories::create(['name_ar' => 'العاب الفيديو وملحقاتها', 'parent_id'=>'272']); // id = 320
        // Category 13 level 3
        $category = App\Categories::create(['name_ar' => 'بلاي ستيشن', 'parent_id'=>'320']); // id = 321
        $category = App\Categories::create(['name_ar' => 'اكس بوكس', 'parent_id'=>'320']); // id = 322
        $category = App\Categories::create(['name_ar' => 'وي', 'parent_id'=>'320']); // id = 323
        $category = App\Categories::create(['name_ar' => 'العاب اليكترونية', 'parent_id'=>'320']); // id = 324
        $category = App\Categories::create(['name_ar' => 'ملحقات الاجهزة', 'parent_id'=>'320']); // id = 325
        $category = App\Categories::create(['name_ar' => 'العاب الفيديو الأخرى', 'parent_id'=>'320']); // id = 326






        // Category 14 level 1
        $category = App\Categories::create(['name_ar' => 'خدمات و تأجير', 'slug' => 'خدمات', 'icon' => 'money', 'photo' => 'front-assets/images/bigcat6.jpg']); // id = 327
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'تأجير', 'parent_id'=>'327']); // id = 328
        // Category 14 level 3
        $category = App\Categories::create(['name_ar' => 'تأجير السيارات والمقطورات والحفارات', 'parent_id'=>'328']); // id = 329
        $category = App\Categories::create(['name_ar' => 'استئجار الاثاث والاجهزة', 'parent_id'=>'328']); // id = 330
        $category = App\Categories::create(['name_ar' => 'تأجير ادوات ومعدات', 'parent_id'=>'328']); // id = 331
        $category = App\Categories::create(['name_ar' => 'اخري', 'parent_id'=>'328']); // id = 332
        $category = App\Categories::create(['name_ar' => 'مكافحة الحشرات', 'parent_id'=>'328']); // id = 333
        $category = App\Categories::create(['name_ar' => 'تنظيف ونقل اثاث', 'parent_id'=>'328']); // id = 334
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'السيارات', 'parent_id'=>'327']); // id = 335
        // Category 14 level 3
        $category = App\Categories::create(['name_ar' => 'خدمات السيارات', 'parent_id'=>'335']); // id = 336
        $category = App\Categories::create(['name_ar' => 'الميكانيكا وكراجات', 'parent_id'=>'335']); // id = 337
        $category = App\Categories::create(['name_ar' => 'الطلاء واصلاح الجسم', 'parent_id'=>'335']); // id = 338
        $category = App\Categories::create(['name_ar' => 'خدمات السيارات الأخرى', 'parent_id'=>'335']); // id = 339
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'الحضانة ورعاية الأطفال', 'parent_id'=>'327']); // id = 340
        $category = App\Categories::create(['name_ar' => 'خدمات النقل والتوصيل', 'parent_id'=>'327']); // id = 341
        $category = App\Categories::create(['name_ar' => 'الحفلات وحفلات الزفاف', 'parent_id'=>'327']); // id = 342
        // Category 14 level 3
        $category = App\Categories::create(['name_ar' => 'منسقي الحفلات', 'parent_id'=>'342']); // id = 343
        $category = App\Categories::create(['name_ar' => 'مقدمي خدمات الضيافة', 'parent_id'=>'342']); // id = 344
        $category = App\Categories::create(['name_ar' => 'البوفيهات والولائم', 'parent_id'=>'342']); // id = 345
        $category = App\Categories::create(['name_ar' => 'فرق حفلات الاطفال', 'parent_id'=>'342']); // id = 346
        $category = App\Categories::create(['name_ar' => 'صالات وقاعات', 'parent_id'=>'342']); // id = 347
        $category = App\Categories::create(['name_ar' => 'مصورين المناسبات', 'parent_id'=>'342']); // id = 348
        $category = App\Categories::create(['name_ar' => 'أخرى', 'parent_id'=>'342']); // id = 349
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'التصوير الفوتوغرافي والفيديو', 'parent_id'=>'327']); // id = 350
        $category = App\Categories::create(['name_ar' => 'الخياطين ومشاغل الخياطة', 'parent_id'=>'327']); // id = 351
        $category = App\Categories::create(['name_ar' => 'الصحة واللياقة البدنية والجمال', 'parent_id'=>'327']); // id = 352
        // Category 14 level 3
        $category = App\Categories::create(['name_ar' => 'المراكز والعيادات الطبية', 'parent_id'=>'352']); // id = 353
        $category = App\Categories::create(['name_ar' => 'العلاجات البديلة', 'parent_id'=>'352']); // id = 354
        $category = App\Categories::create(['name_ar' => 'علاجات التجميل', 'parent_id'=>'352']); // id = 355
        $category = App\Categories::create(['name_ar' => 'تصفيف الشعر', 'parent_id'=>'352']); // id = 356
        $category = App\Categories::create(['name_ar' => 'التدليك وخدمات العناية بالجسم', 'parent_id'=>'352']); // id = 357
        $category = App\Categories::create(['name_ar' => 'الصحة واللياقة البدنية والجمال الأخرى', 'parent_id'=>'352']); // id = 358
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'البناء والعمارة', 'parent_id'=>'327']); // id = 359
        // Category 14 level 3
        $category = App\Categories::create(['name_ar' => 'التصميم الداخلي', 'parent_id'=>'359']); // id = 360
        $category = App\Categories::create(['name_ar' => 'تدفئة وتكييف', 'parent_id'=>'359']); // id = 361
        $category = App\Categories::create(['name_ar' => 'البناء الحجري والقرميد', 'parent_id'=>'359']); // id = 362
        $category = App\Categories::create(['name_ar' => 'نجارة', 'parent_id'=>'359']); // id = 363
        $category = App\Categories::create(['name_ar' => 'مقاولين ومشرفين بناء', 'parent_id'=>'359']); // id = 364
        $category = App\Categories::create(['name_ar' => 'سباكة وكهرباء', 'parent_id'=>'359']); // id = 365
        $category = App\Categories::create(['name_ar' => 'بارع في كل الصنع', 'parent_id'=>'359']); // id = 366
        $category = App\Categories::create(['name_ar' => 'الطلاء والديكور', 'parent_id'=>'359']); // id = 367
        $category = App\Categories::create(['name_ar' => 'التجصيص والتبليط', 'parent_id'=>'359']); // id = 368
        $category = App\Categories::create(['name_ar' => 'كشف تسربات المياه', 'parent_id'=>'359']); // id = 369
        $category = App\Categories::create(['name_ar' => 'باقي قطاع التشييد والبناء', 'parent_id'=>'359']); // id = 370
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'الكمبيوتر والاتصالات وتقنية المعلومات', 'parent_id'=>'327']); // id = 371
        // Category 14 level 3
        $category = App\Categories::create(['name_ar' => 'اصلاح الكمبيوتر والهاتف', 'parent_id'=>'371']); // id = 372
        $category = App\Categories::create(['name_ar' => 'الجرافيك وتصميم المواقع', 'parent_id'=>'371']); // id = 373
        $category = App\Categories::create(['name_ar' => 'التسويق عبر الانترنت', 'parent_id'=>'371']); // id = 374
        $category = App\Categories::create(['name_ar' => 'تطوير الشبكة', 'parent_id'=>'371']); // id = 375
        $category = App\Categories::create(['name_ar' => 'باقي الحاسوب والاتصالات', 'parent_id'=>'371']); // id = 376
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'تنسيق وتخطيط الحدائق', 'parent_id'=>'327']); // id = 377
        $category = App\Categories::create(['name_ar' => 'التعليم والتدريس', 'parent_id'=>'327']); // id = 378
        // Category 14 level 3
        $category = App\Categories::create(['name_ar' => 'الدورات والتدريب', 'parent_id'=>'378']); // id = 379
        $category = App\Categories::create(['name_ar' => 'الدروس الخصوصية لطلاب المدارس والجامعات', 'parent_id'=>'378']); // id = 380
        $category = App\Categories::create(['name_ar' => 'تعليم اللغة والارشاد', 'parent_id'=>'378']); // id = 381
        $category = App\Categories::create(['name_ar' => 'غيرها من التعليم والارشاد', 'parent_id'=>'378']); // id = 382
        $category = App\Categories::create(['name_ar' => 'خدمات الاعمال الأخرى', 'parent_id'=>'378']); // id = 383
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'خدمات الحيوانات الاليفة', 'parent_id'=>'327']); // id = 384
        // Category 14 level 3
        $category = App\Categories::create(['name_ar' => 'الطب البيطري', 'parent_id'=>'384']); // id = 385
        $category = App\Categories::create(['name_ar' => 'التنظيف والعناية', 'parent_id'=>'384']); // id = 386
        $category = App\Categories::create(['name_ar' => 'حضانة الحيوانات الاليفة', 'parent_id'=>'384']); // id = 387
        $category = App\Categories::create(['name_ar' => 'تدريب', 'parent_id'=>'384']); // id = 388
        $category = App\Categories::create(['name_ar' => 'خدمات الحيوانات الاليفة الأخرى', 'parent_id'=>'384']); // id = 389
        // Category 14 level 2
        $category = App\Categories::create(['name_ar' => 'خدمات التأمين', 'parent_id'=>'327']); // id = 390
        $category = App\Categories::create(['name_ar' => 'خدمات وتأجير الأخرى', 'parent_id'=>'327']); // id = 391




        // Category 15 level 1
        $category = App\Categories::create(['name_ar' => 'العقارات', 'slug' => 'عقار','icon' => 'building-o', 'photo' => 'front-assets/images/bigcat3.jpg']); // id = 392
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        for($i = 17; $i <= 20; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 15 level 2
        $category = App\Categories::create(['name_ar' => 'الاعمال التجارية للبيع', 'parent_id'=>'392']); // id = 393
        $category = App\Categories::create(['name_ar' => 'مكاتب ادارية ومعارض تجارية', 'parent_id'=>'392']); // id = 394
        $category = App\Categories::create(['name_ar' => 'مستودعات ومخازن', 'parent_id'=>'392']); // id = 395
        $category = App\Categories::create(['name_ar' => 'اراضي للبيع', 'parent_id'=>'392']); // id = 396
        // Category 15 level 3
        $category = App\Categories::create(['name_ar' => 'اراضي سكنية', 'parent_id'=>'396']); // id = 397
        $category = App\Categories::create(['name_ar' => 'اراضي تجارية', 'parent_id'=>'396']); // id = 398
        $category = App\Categories::create(['name_ar' => 'اراضي زراعية', 'parent_id'=>'396']); // id = 399
        // Category 15 level 2
        $category = App\Categories::create(['name_ar' => 'عقار للبيع', 'parent_id'=>'392']); // id = 400
        // Category 15 level 3
        $category = App\Categories::create(['name_ar' => 'فلل', 'parent_id'=>'400']); // id = 401
        $category = App\Categories::create(['name_ar' => 'قصور', 'parent_id'=>'400']); // id = 402
        $category = App\Categories::create(['name_ar' => 'دبلكسات', 'parent_id'=>'400']); // id = 403
        $category = App\Categories::create(['name_ar' => 'شقق', 'parent_id'=>'400']); // id = 404
        $category = App\Categories::create(['name_ar' => 'عمائر وابراج', 'parent_id'=>'400']); // id = 405
        $category = App\Categories::create(['name_ar' => 'استراحات وشاليهات', 'parent_id'=>'400']); // id = 406
        $category = App\Categories::create(['name_ar' => 'مزارع', 'parent_id'=>'400']); // id = 407
        // Category 15 level 2
        $category = App\Categories::create(['name_ar' => 'عقار للإيجار', 'parent_id'=>'392']); // id = 408
        // Category 15 level 3
        $category = App\Categories::create(['name_ar' => 'فلل', 'parent_id'=>'408']); // id = 409
        $category = App\Categories::create(['name_ar' => 'قصور', 'parent_id'=>'408']); // id = 410
        $category = App\Categories::create(['name_ar' => 'دبلكسات', 'parent_id'=>'408']); // id = 411
        $category = App\Categories::create(['name_ar' => 'شقق', 'parent_id'=>'408']); // id = 412
        $category = App\Categories::create(['name_ar' => 'عمائر وابراج', 'parent_id'=>'408']); // id = 413
        // Category 15 level 2
        $category = App\Categories::create(['name_ar' => 'استراحات وشاليهات للإيجار', 'parent_id'=>'392']); // id = 414
        $category = App\Categories::create(['name_ar' => 'غرف للإيجار', 'parent_id'=>'392']); // id = 415
        $category = App\Categories::create(['name_ar' => 'مشاركة المنزل', 'parent_id'=>'392']); // id = 416
        $category = App\Categories::create(['name_ar' => 'عقارات اخري', 'parent_id'=>'392']); // id = 417





        // Category 16 level 1
        $category = App\Categories::create(['name_ar' => 'الرياضة و اللياقة البدنية', 'slug' => 'الرياضة', 'icon' => 'futbol-o', 'photo' => 'front-assets/images/bigcat4.jpg']); // id = 418
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 16 level 2
        $category = App\Categories::create(['name_ar' => 'دراجات', 'parent_id'=>'418']); // id = 419
        $category = App\Categories::create(['name_ar' => 'الملاكمة وفنون الدفاع عن النفس', 'parent_id'=>'418']); // id = 420
        $category = App\Categories::create(['name_ar' => 'صيد السمك والغوص', 'parent_id'=>'418']); // id = 421
        $category = App\Categories::create(['name_ar' => 'جولف وتنس', 'parent_id'=>'418']); // id = 422
        $category = App\Categories::create(['name_ar' => 'صالات الالعاب الرياضية واللياقة البدنية', 'parent_id'=>'418']); // id = 423
        $category = App\Categories::create(['name_ar' => 'المكملات الغذائية والبروتينات', 'parent_id'=>'418']); // id = 424
        $category = App\Categories::create(['name_ar' => 'لياقة ورياضة اخري', 'parent_id'=>'418']); // id = 425



        // Category 17 level 1
        $category = App\Categories::create(['name_ar' => 'الحيوانات الاليفة', 'slug' => 'حيوانات','icon' =>'paw', 'photo' => 'front-assets/images/bigcat17.jpg']); // id = 426
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 16 level 2
        $category = App\Categories::create(['name_ar' => 'الطيور', 'parent_id'=>'426']); // id = 427
        $category = App\Categories::create(['name_ar' => 'القطط', 'parent_id'=>'426']); // id = 428
        $category = App\Categories::create(['name_ar' => 'الكلاب والجراء', 'parent_id'=>'426']); // id = 429
        $category = App\Categories::create(['name_ar' => 'سمك', 'parent_id'=>'426']); // id = 430
        $category = App\Categories::create(['name_ar' => 'الخيول والمهور', 'parent_id'=>'426']); // id = 431
        $category = App\Categories::create(['name_ar' => 'مواشي', 'parent_id'=>'426']); // id = 432
        $category = App\Categories::create(['name_ar' => 'الارانب', 'parent_id'=>'426']); // id = 433
        $category = App\Categories::create(['name_ar' => 'الزواحف والبرمائيات', 'parent_id'=>'426']); // id = 434
        $category = App\Categories::create(['name_ar' => 'حيوانات اليفه (فقدت / وجدت)', 'parent_id'=>'426']); // id = 435
        $category = App\Categories::create(['name_ar' => 'منتجات الحيوانات الاليفة', 'parent_id'=>'426']); // id = 436
        $category = App\Categories::create(['name_ar' => 'الحيوانات الاليفة الأخرى', 'parent_id'=>'426']); // id = 437

        // Category 18 level 1
        $category = App\Categories::create(['name_ar' => 'رحلات برية', 'slug' => 'رحلات','icon' =>'free-code-camp', 'photo' => 'front-assets/images/bigcat18.jpg']); // id = 438
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
        // Category 18 level 2
        $category = App\Categories::create(['name_ar' => 'تخييم وتنزه', 'parent_id'=>'438']); // id = 439
        $category = App\Categories::create(['name_ar' => 'رحلات بريه', 'parent_id'=>'438']); // id = 440

        // Category 19 level 1
        $category = App\Categories::create(['name_ar' => 'البضائع المتنوعة', 'slug' => 'بضائع','icon' =>'cubes', 'photo' => 'front-assets/images/bigcat19.jpg']); // id = 441
        for($i = 1; $i <= 2; $i++)
            DB::table('categories_filters_groups')->insert(['categories_id' => $category->id, 'filters_groups_id' => $i]);
    }
}
