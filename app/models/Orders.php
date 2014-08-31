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
	public function customer()
	{
		return $this-> belongsTo('LabCustomer','customer_id','id');
	}
	
	public function products()
	{
		return $this-> hasMany('LabBOMItem','order_id','id');
	}
	/**
	 * calculate, update order total and return its subtotal
	 *
	 * @var string
	 */
	public function getSubtotal()
	{
		$subtotal = "0.0";
		if( count($this-> products()-> get()) )
		{
			$subtotal = LabBOMItem::select( DB::raw('SUM( (price * quantity) - (price * quantity)*(discount / 100.00)) as value'))
			                       -> whereOrderId($this-> id)
			                       -> groupBy('order_id')
			                       -> first()
			                       -> value;
		}
		$total = $subtotal +  $subtotal * $this-> tax/100.00;
		$order = LabOrder::find($this-> id);
		$order-> total = $total;
        $order-> save();
		return $subtotal;
	}
}
