<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 6/27/14
 * Time: 3:49 PM
 */

class CategoryTableSeeder extends seeder {


    public function run()
    {
        DB::table('categories')->delete();


        Category::create(array(
            'cat_id' => '111111111',
            'cat_semantic'=>'how much the room and area are clean',
            'eng_uk'=>'cleanliness',
            'ar_ps' => 'نظافة',
            'ar_eg'=>'نظافة',

            )
        );

        Category::create(array(
                'cat_id' => '111111112',
                'cat_semantic'=>'how much the bed and facilities are clean',
                'eng_uk'=>'comfort',
                'ar_ps' => 'راحة',
                'ar_eg'=>'راحة',

            )
        );

        Category::create(array(
                'cat_id' => '111111113',
                'cat_semantic'=>'how much the location is convenient',
                'eng_uk'=>'location',
                'ar_ps' => 'موقع',
                'ar_eg'=>'موقع',

            )
        );
        Category::create(array(
                'cat_id' => '111111114',
                'cat_semantic'=>'how much the facilities are reliable',
                'eng_uk'=>'facilities',
                'ar_ps' => 'مستلزمات',
                'ar_eg'=>'خدمات',

            )
        );
        Category::create(array(
                'cat_id' => '111111115',
                'cat_semantic'=>'how much it is easy to deal to the staff',
                'eng_uk'=>'staff',
                'ar_ps' => 'تعامل الموظفين',
                'ar_eg'=>'لطف الموظفين',

            )
        );
        Category::create(array(
                'cat_id' => '111111116',
                'cat_semantic'=>'value of the money',
                'eng_uk'=>'price',
                'ar_ps' => 'سعر',
                'ar_eg'=>'سعر',

            )
        );
        Category::create(array(
                'cat_id' => '111111117',
                'cat_semantic'=>'how much the rooms are wide',
                'eng_uk'=>'room size',
                'ar_ps' => 'مساحة الغرفة',
                'ar_eg'=>'نظافة',

            )
        );
        Category::create(array(
                'cat_id' => '111111118',
                'cat_semantic'=>'how much the noise',
                'eng_uk'=>'noise',
                'ar_ps' => 'ازعاج',
                'ar_eg'=>'ازعاج',

            )
        );
        Category::create(array(
                'cat_id' => '111111119',
                'cat_semantic'=>'speed and reliability of the wifi',
                'eng_uk'=>'wifi',
                'ar_ps' => 'انترنت',
                'ar_eg'=>'الشبكة',

            )
        );
        Category::create(array(
                'cat_id' => '111111120',
                'cat_semantic'=>'how was the swimming pool',
                'eng_uk'=>'swimming',
                'ar_ps' => 'سباحة',
                'ar_eg'=>'عوم',

            )
        );
        Category::create(array(
                'cat_id' => '111111121',
                'cat_semantic'=>'parking slots',
                'eng_uk'=>'parking',
                'ar_ps' => 'كراج',
                'ar_eg'=>'مرأب',

            )
        );
        Category::create(array(
                'cat_id' => '111111122',
                'cat_semantic'=>'how much the food was tasty',
                'eng_uk'=>'food',
                'ar_ps' => 'طعام',
                'ar_eg'=>'أكل',

            )
        );







    }

} 