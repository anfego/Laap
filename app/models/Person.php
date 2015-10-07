<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Person extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'person';

    protected $fillable = array('first_name',
                                'last_name',
                                'personal_id',
                                'dob',
                                'email',
                                'updated_by');

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    /**
     * Relationships with other tables
     *
     * @var array
     */
    public function exams()
    {
        return $this -> hasMany('Exam', 'person_id', 'id');
    }
    public function phones() 
    {
        return $this -> hasMany('Phone', 'person_id', 'id');
    }
    public function addresses() 
    {
        return $this -> hasMany('Address', 'person_id', 'id');
    }
    public function emails()
    {
        return $this -> hasMany('Email', 'person_id', 'id');
    }
}
