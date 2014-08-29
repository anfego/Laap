<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class LabOrder extends Eloquent{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lab_orders';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	/**
	 * The attributes protected for mass-assigment
	 *
	 * @var array
	 */
	protected $guarded = [
		'id',
		'created_by',
		'created_at',
		'updated_at'
	];
	
	/**
	 * Relationships with other tables
	 *
	 * @var string
	 */
	public function LabCustomer()
	{
		return $this-> belongsTo('LabCustomer','idCustomer','id');
	}
}
