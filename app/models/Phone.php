<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Phone extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phone';

    protected $fillable = array('person_id',
                                'ref_name',
                                'area_code',
                                'phone',
                                'active',
                                'primary',
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
        return $this-> belongsTo('Person', 'person_id', 'id');
    }
}
