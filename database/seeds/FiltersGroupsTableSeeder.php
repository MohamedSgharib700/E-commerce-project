<?php

use Illuminate\Database\Seeder;

class FiltersGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('filters_groups')->insert(['group_name' => 'الدولة', 'type' => 1]);// id = 1
        DB::table('filters_groups')->insert(['group_name' => 'المدينة', 'type' => 1, 'parent_id' => 1]);// id = 2
        
        DB::table('filters_groups')->insert(['group_name' => 'نوع الراتب', 'type' => 1]);// id = 3
        DB::table('filters_groups')->insert(['group_name' => 'نوع العمل', 'type' => 1]);// id = 4
        DB::table('filters_groups')->insert(['group_name' => 'نوع مقدم الطلب', 'type' => 1]);// id = 5
        
        DB::table('filters_groups')->insert(['group_name' => 'الترخيص', 'type' => 1]);// id = 6
        DB::table('filters_groups')->insert(['group_name' => 'الماركة', 'type' => 1]);// id = 7
        DB::table('filters_groups')->insert(['group_name' => 'الموديل', 'type' => 1, 'parent_id' => 6]);// id = 8
        DB::table('filters_groups')->insert(['group_name' => 'تاريخ الصنع', 'type' => 1, 'parent_id' => 7]);// id = 9
        DB::table('filters_groups')->insert(['group_name' => 'اللون', 'type' => 1]);// id = 10
        DB::table('filters_groups')->insert(['group_name' => 'سعة المحرك', 'type' => 1]);// id = 11
        DB::table('filters_groups')->insert(['group_name' => 'ناقل الحركة', 'type' => 1]);// id = 12
        DB::table('filters_groups')->insert(['group_name' => 'نوع الوقود', 'type' => 1]);// id = 13
        DB::table('filters_groups')->insert(['group_name' => 'فتحة السقف', 'type' => 1]);// id = 14
        DB::table('filters_groups')->insert(['group_name' => 'نوع الجر', 'type' => 1]);// id = 15
        DB::table('filters_groups')->insert(['group_name' => 'نوع السيارة', 'type' => 1]);// id = 16

        DB::table('filters_groups')->insert(['group_name' => 'عدد الغرف', 'type' => 1]);// id = 17
        DB::table('filters_groups')->insert(['group_name' => 'الحمامات', 'type' => 1]);// id = 18
        DB::table('filters_groups')->insert(['group_name' => 'الاستقبال', 'type' => 1]);// id = 19
        DB::table('filters_groups')->insert(['group_name' => 'الطابق', 'type' => 1]);// id = 20

        DB::table('filters_groups')->insert(['group_name' => 'نوع الشقة', 'type' => 1]);// id = 21
        DB::table('filters_groups')->insert(['group_name' => 'عدد الغرف', 'type' => 1]);// id = 22
        DB::table('filters_groups')->insert(['group_name' => 'عدد الافراد', 'type' => 1]);// id = 23

        DB::table('filters_groups')->insert(['group_name' => 'الماركة', 'type' => 1]);// id = 24
    }
}
