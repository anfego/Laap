<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function($table){
			$table	->	increments("id");
			$table	->	integer("idCustomer")->unsigned();
			$table	->	enum("choices",array('pendiente','cancelada','anulada'));
			$table	->	timestamps();
		});

		Schema::create('products_ordered',function($table){
			$table	->	integer("idOrder")->unsigned();
			$table	->	integer("idProduct")->unsigned();
			$table	->	integer("quantity");
			$table	->	decimal('price');
			$table	->	timestamps();
		});
		Schema::create('products', function($table){
			$table	->	increments('id');
			$table	->	string('name');
			$table	->	decimal('price',6,2);
			$table	->	timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_ordered');
		Schema::drop('orders');
		Schema::drop('products');
	}

}
