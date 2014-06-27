<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 6/27/14
 * Time: 12:29 PM
 */

class EvaluationValue extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evaluation_values';

    protected $fillable = array();

    public function evaluation(){
        return $this->belongsTo('Evaluation');
    }

    public function category(){
        return $this->belongsTo('Category');
    }





} 