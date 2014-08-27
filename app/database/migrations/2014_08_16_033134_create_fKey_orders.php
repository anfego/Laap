<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKeyOrders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lab_orders', function(Blueprint $table)
		{
			$table->foreign('idCustomer')->references('id')->on('lab_customer');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lab_orders', function(Blueprint $table)
		{
			$table->dropForeign('lab_orders_idcustomer_foreign');
		});
	}

}
