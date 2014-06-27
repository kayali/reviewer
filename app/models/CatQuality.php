<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 6/27/14
 * Time: 12:26 PM
 */

class CatQuality extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cat_qualities';
    protected $guarded = [''];
    public $timestamps = false;
    //protected $fillable = array();

    public function category(){

       return $this->belongsTo('Category');

    }


}