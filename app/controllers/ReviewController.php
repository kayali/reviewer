<?php 
class ReviewController extends BaseController {


	public function organizationCategories( $organization_id ){

		$categories = Category::take(5)->with('catQualities')->get();
		$items = array();
		foreach ($categories as $category) {

			$labels = array();
			foreach ($category->catQualities as $catQuality) {
				$labels[] = $catQuality->cat_quality_eng_uk;
			}
			$items[] =  array( 'id' => $category->id , 'name' => $category->cat_semantic  ,'labels' => $labels ); 
		}

		return json_encode( $items );
	}





    /**
     * Show the profile for the given user.
     */
    public function reviewForm( $organization_id ){
    	$items_json = $this->organizationCategories( $organization_id );
    	$items = json_decode( $items_json, true );
    	return View::make('review', array( 'items' => $items , 'organization_id' => $organization_id));
    }


    public function review(){





	// $name = Input::all('');
 //    print_r( $name );



     // 	$user = array(
     // 		'user_name' => 'Issa',
     // 		'email' => 'issa@iphase.me',
     // 		'user_country' => 'Palestine',
     // 		'user_language' => 'ar',
     // 		'birth_date' => '1970-01-01',
     // 		'gender' => 1
     // 	);


    	// User::create( $user );
    	$evaluation_values = Input::get('categories');

    	$total = 0;
    	foreach ($evaluation_values as $key => $evaluation_value) {   		
    		$total += $evaluation_value['value'];
    	}

    	$evaluations = array(
    		'user_id' => 1,
    		'organization_id' => Input::get('organization_id'),
    		'template_id' => 1,
    		'date' => date( 'Y-m-d' ),
    		'avg' => (int)( $total / count(  $evaluation_values) )
    		);

    	$evaluations = $this->verbalize( $evaluations  );

    	$evaluations_ = Evaluation::create( $evaluations );
    	
    	foreach ($evaluation_values as $key => $evaluation_value) {
    		$evaluation_value['evaluation_id'] = $evaluations_->id;
    		EvaluationValue::create( $evaluation_value );
    	}
		//die();
    }

    function verbalize( $data ){
    	$data['eval_verbalized'] = "asdasd asdas das da sd asdasda";
    	$data['eval_updated'] = "asdasd asdas das da sd asdasda";
    	return $data;
    }



}

?>