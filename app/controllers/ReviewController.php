<?php 
class ReviewController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function reviewForm()
    {
       	$items = array(
    		array( 
    			'id' => 1, 
    			'name' => 'Loby cleanes',
    			'labels' => array(
    				1 => "Very good",
    				2 => "Good",
    				3 => "OK",
    				4 => "Bad",
    				5 => "Very Bad",		
    			)
    		),

    		array( 
    			'id' => 2, 
    			'name' => 'Bathroom cleanes',
    			'labels' => array(
    				1 => "Very good",
    				2 => "Good",
    				3 => "OK",
    				4 => "Bad",
    				5 => "Very Bad",		
    			)
    		),

    		array( 
    			'id' => 1, 
    			'name' => 'Wifi',
    			'labels' => array(
    				1 => "Very good",
    				2 => "Good",
    				3 => "OK",
    				4 => "Bad",
    				5 => "Very Bad",		
    			)
    		),

    		array( 
    			'id' => 1, 
    			'name' => 'Lighting',
    			'labels' => array(
    				1 => "Very zble",
    				2 => "Good",
    				3 => "OK",
    				4 => "Bad",
    				5 => "Very Bad",		
    			)
    		),
    	);

      	return View::make('review', array('items' => $items));
    }

}

 ?>