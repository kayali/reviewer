<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 6/27/14
 * Time: 4:36 PM
 */

class OrganizationTableSeeder extends seeder{

    public function run()
    {
        DB::table('organizations')->delete();


        Organization::create(array(
            'o_name' => 'Jericho Resort',
            'o_email'=>'info@jr.ps',
            'o_country'=>'ps',
            'o_city' =>'jericho',
            'lat' => '123456',
            'long'=>'1449584',
            )
        );
        Organization::create(array(
                'o_name' => 'DaysInn',
                'o_email'=>'info@jr.ps',
                'o_country'=>'eg',
                'o_city' =>'cairo',
                'lat' => '123232',
                'long'=>'144332',
            )
        );



         }

}