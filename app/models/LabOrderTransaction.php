<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class LabOrderTransaction extends Eloquent{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lab_order_history';

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
	public function orders()
	{
		return $this-> belongsTo('LabOrder', 'order_id', 'id');
	}
	/**
	 * Helper functions
	 *
	 * @var array
	 */
	public function recordCloseEvent($order_id)
	{
		$order = LabOrder::findOrFail($order_id);
		if ($order-> isOpen()) 
		{
			$this-> order_id = $order_id;
			$this-> action = 'closed';
			$this-> balance_new = $order-> total;
			$this-> balance_old = $order-> total;
			$this-> balance_dif = 0.0;
			$this-> updated_by = Auth::user()-> username;
			$this-> save();
			return True;
		}
		return False;
	}
	public function recordPayment($amount)
	{
		$transaction = new LabOrderTransaction;
	}


}