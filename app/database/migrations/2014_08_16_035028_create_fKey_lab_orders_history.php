<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKeyLabOrdersHistory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lab_orders_history', function(Blueprint $table)
		{
			$table-> foreign('idOrder')-> references('id')-> on('lab_orders');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lab_orders_history', function(Blueprint $table)
		{ 
			$table-> dropForeign('lab_orders_history_idorder_foreign');
		});
	}

}
