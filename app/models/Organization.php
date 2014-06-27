<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 6/27/14
 * Time: 12:30 PM
 */

class Organization extends ELoquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organizations';

    protected $fillable = array();


    public function evaluations()
    {
        return $this->hasMany("Evaluation");
    }

} 