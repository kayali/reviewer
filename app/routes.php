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

    return "hello";
	//return View::make('hello');
});


Route::get('review/{organization_id}', 'ReviewController@reviewForm');

Route::post('review2', 'ReviewController@review');
Route::get('reviews/top','ReviewController@topReviews');