<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKeyLabPayments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lab_orders_payments', function(Blueprint $table)
		{
			$table->foreign('idOrder')->references('id')->on('orders');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lab_orders_payments', function(Blueprint $table)
		{
			$table->dropForeign('lab_orders_payments_idorder_foreign');
		});
	}

}
