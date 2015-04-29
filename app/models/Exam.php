<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Exam extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exam';

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
    public function person()
    {
        return $this-> belongsTo('Person', 'person_id', 'id');
    }
}
