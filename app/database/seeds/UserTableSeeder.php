<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 6/27/14
 * Time: 12:01 PM
 */

class UserTableSeeder extends Seeder{


    public function run()
    {

        User::create(array(
            'user_name' => 'mustafa',
            'user_country'=>'ps',
            'user_language' => 'ar',
            'gender'=>'m',
            'email'=>'mustafa@gmail.com'

        ));
    }


} 