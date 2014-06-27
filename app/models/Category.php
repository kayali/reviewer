<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 6/27/14
 * Time: 12:23 PM
 */

class Category extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    protected $fillable = array();

    public function catQualities(){

        return $this->hasMany('CatQuality');
    }

    public function evaluationValues(){

        return $this->hasMany('EvaluationValue');
    }





} 