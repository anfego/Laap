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
		Schema::create('orders',function(Blueprint $table)
		{
			$table-> increments("id");
			$table-> integer("idCustomer")->unsigned();
			$table-> decimal("discountStd", 3, 2);
			$table-> decimal("discountSpc", 3, 2);
			$table-> Timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
