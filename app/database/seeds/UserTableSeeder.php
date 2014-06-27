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
        DB::table('users')->delete();


        User::create(array(
            'user_name' => 'Mustafa',
            'email'=>'mustafa@gmail.com',
            'user_country'=>'ps',
            'user_language' => 'ar',
            'gender'=>'m',
            'birth_date' => '2014-06-02'));
        User::create(array(
            'user_name' => 'Omar',
            'email'=>'mustafa@gmail.com',
            'user_country'=>'ps',
            'user_language' => 'ar',
            'gender'=>'m',
            'birth_date' => '2014-06-02'));
        User::create(array(
            'user_name' => 'issa',
            'email'=>'mustafa@gmail.com',
            'user_country'=>'ps',
            'user_language' => 'ar',
            'gender'=>'m',
            'birth_date' => '2014-06-02'));
        User::create(array(
            'user_name' => 'Sameh',
            'email'=>'mustafa@gmail.com',
            'user_country'=>'ps',
            'user_language' => 'ar',
            'gender'=>'m',
            'birth_date' => '2014-06-02'));
    }


} 