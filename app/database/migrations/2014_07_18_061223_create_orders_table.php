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
		Schema::create('lab_orders',function(Blueprint $table)
		{
			$table-> increments("id");
			$table-> integer("idCustomer")->unsigned();
			$table-> decimal("total",4,2);
			$table-> string("created_by");
			$table-> date("delivery_date");
			$table-> decimal("tax",3,2);
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
		Schema::drop('lab_orders');
	}

}
