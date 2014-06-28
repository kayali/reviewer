<?php 
class ReviewController extends BaseController {


    /**
     * Organization iframe
     */
    public function reviewForm( $organization_id ){

    	$categories = Category::take(5)->with('catQualities')->get();
        $user = Session::get('User');

        $items = array();
        foreach ($categories as $category) {

            $labels = array();
            foreach ($category->catQualities as $catQuality) {
                $labels[] = $catQuality->cat_quality_eng_uk;
            }
            $items[] =  array( 'id' => $category->id , 'name' => $category->eng_uk  ,'labels' => $labels ); 
        }


        $org = DB::table('organizations')->where('id', $organization_id)->first();
    

        //retrieve top reviews : most recent n reviews for specific organization
        return View::make('review', array( 'items' => $items , 'organization_id' => $organization_id,'org' => $org,  'user' => $user));
    }


    /**
     * get Top 5 reviees
     */
    public function topReviews( $organization_id, $count = 5 ){
        $top_reviews = Evaluation::where('organization_id','=',$organization_id)->orderBy('created_at','desc')->take( $count )->get();
        return View::make('reviews_list', array( 'top_reviews' => $top_reviews));
    }

    //save review
    public function review(){

        $user = Session::get('User');
        $organization_id = Input::get('organization_id');

        if( !empty( $user ) && in_array( $organization_id , Session::get('User.reviews'))){
            return json_encode(array( 'success' => false, 'message' => 'You have already review this organization.' ));
        }
	   
        if( empty( $user ) ){
             //build dummy user now
            $user = array(
                'user_name' => 'Anynomus',
                'email' => 'anynomus@reviewer.com',
                'user_country' => 'Pa',
                'user_language' => 'eng',
                'birth_date' => '1970-01-01',
                'gender' => 1
            );

             //save user to db then to session
            $user = User::create( $user );
            Session::put('User', array( 'id' => $user->id, 'reviews' => array()));
        }

        $evaluation_values = Input::get('categories');

        //calculate the Avarage
        $total = 0;
        foreach ($evaluation_values as $key => $evaluation_value) {   		
          $total += $evaluation_value['value'];
        }

        //formalize the array
        $evaluations = array(
            'user_id' => Session::get('User.id'),
            'organization_id' => Input::get('organization_id'),
            'template_id' => 1,
            'date' => date( 'Y-m-d' ),
            'avg' => (int)( $total / count(  $evaluation_values) )
        );

        //varibialize the text
        $evaluations['eval_verbalized'] = $this->verbalize( $evaluations , $evaluation_values  );

        //save to db & push org_id to session
        $evaluations_ = Evaluation::create( $evaluations );
        Session::push('User.reviews', $organization_id );

        //add evamutaion id to evekutaion values, save it to db
        foreach ($evaluation_values as $key => $evaluation_value) {
            $evaluation_value['evaluation_id'] = $evaluations_->id;
            EvaluationValue::create( $evaluation_value );
        }

       // return success reso
        return json_encode(array( 'success' => true ));
    }


    /**
     * continous evaluation of form ,called by ajax
     */
    public function evaluateForPreview(){

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
            'avg' => (int)( $total / count( $evaluation_values) )
            );
        $evaluation = $this->verbalize( $evaluations , $evaluation_values  );
        return json_encode(array('evaluation'=>$evaluation));

    }

    

    function verbalize( $data, $evaluation_values ){
        return "This is me, Omar Kyali alert :p";
    }

}

?>