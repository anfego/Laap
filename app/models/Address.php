<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Address extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'address';

    protected $fillable = array('person_id',
                                'ref_name',
                                'state',
                                'city',
                                'country',
                                'street_l1',
                                'street_l2',
                                'street_l3',
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

