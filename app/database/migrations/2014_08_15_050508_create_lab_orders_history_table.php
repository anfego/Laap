<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabOrdersHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_orders_history', function(Blueprint $table)
		{
			$table-> integer('idOrder')-> unsigned();
			$table-> enum("action", array('delete', 'update'));
			$table-> decimal('balance_old',6,2);
			$table-> decimal('balance_new',6,2);
			$table-> decimal('balance_dif',6,2);
			$table-> string("updated_by");
			$table-> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lab_orders_history');
	}

}