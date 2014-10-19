<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Examination extends Eloquent{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'examination';

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
	public function examinations()
	{
		return $this-> belongsTo('Pacient', 'pacient_id', 'id');
	}
}
