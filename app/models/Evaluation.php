<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 6/27/14
 * Time: 12:27 PM
 */

class Evaluation extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evaluations';

    protected $fillable = array();

    public function user()
    {
        return $this->belongsTo("User");
    }

    public function organization()
    {
        return $this->belongsTo("Organization");
    }

    public function template()
    {
        return $this->belongsTo("Template");
    }



    public function evaluationValues(){


        return $this->hasMany('EvaluationValue');



    }





} 