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
			$table-> integer("idCustomer")-> unsigned();
			$table-> decimal("total",6,2);
			$table-> enum("status", array('open', 'closed', 'unpaid', 'paid'));
			$table-> string("created_by");
			$table-> date("delivery_date");
			$table-> decimal("tax",5,2);
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
