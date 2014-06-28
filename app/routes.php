<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	print "<meta charset='utf8'>";
	$dummy_review = array(
		'avg'=>2,
		'categories'=>array(
			array(
				'name'=>'WiFi',
				'quality'=>'very good',
				'rating'=>'4',
			),
			array(
				'name'=>'cleaness',
				'quality'=>'fine',
				'rating'=>'3',
			),
			array(
				'name'=>'staff',
				'quality'=>'really un happy',
				'rating'=>'1',
			),
			array(
				'name'=>'pool',
				'quality'=>'un happy',
				'rating'=>'1',
			),
			array(
				'name'=>'room size',
				'quality'=>'really disappointed',
				'rating'=>'1',
			),
		),
	);

	$dummy_review = array(
		'avg'=>2,
		'categories'=>array(
			array(
				'name'=>'االانترنت',
				'quality'=>'جيدة',
				'rating'=>'4',
			),
			array(
				'name'=>'النظافة',
				'quality'=>'كانت مقبولة',
				'rating'=>'3',
			),
			array(
				'name'=>'تعامل الموظفين',
				'quality'=>'كان سيذا للغاية',
				'rating'=>'1',
			),
			array(
				'name'=>'البركة',
				'quality'=>'غير صالحة للاستعمال بتاتا',
				'rating'=>'1',
			),
			array(
				'name'=>'مساحة الغرفة',
				'quality'=>'كانت ضيقة جدا',
				'rating'=>'1',
			),
		),
	);
	$verbalized_text = new Verbalizer(1,"ar", $dummy_review);
});
