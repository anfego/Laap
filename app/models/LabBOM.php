<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class LabBOMItem extends Eloquent{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lab_bom';

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
        'order_id',
        'product_id',
        'price'
    ];
    
    /**
     * Relationships with other tables
     *
     * @var string
     */
    public function labOrder()
    {
        return $this-> belongsTo('LabOrder','order_id','id');
    }
    public function products()
    {
        return $this-> belongsTo('LabProduct','product_id','id');
    }
    /**
     * Costrunctor
     *
     * @var decimal
     */
    public function __construct()
    {

        $this-> quantity = "0";
        $this-> price = "0.0";
    }
    /**
     * Helper functions
     *
     * @var decimal
     */
    public function productPrice()
    {
        return $this-> price;
    }
    public function totalPrice()
    {
        return ($this-> price)*($this-> quantity);
    }
    protected function getSubtotal()
    {
        return $this-> quantity * $this-> price - ($this-> quantity * $this-> price)*$this->discount/100.00 ;
    }

}
