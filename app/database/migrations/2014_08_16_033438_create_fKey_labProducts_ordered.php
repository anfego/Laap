<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKeyLabProductsOrdered extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lab_products_ordered', function(Blueprint $table)
		{
			$table->foreign( 'idOrder' )	->references('id')->on('orders');
			$table->foreign( 'idProduct' )	->references('id')->on('lab_products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lab_products_ordered', function(Blueprint $table)
		{
			$table->dropForeign( 'lab_products_ordered_idorder_foreign' );
			$table->dropForeign( 'lab_products_ordered_idproduct_foreign' );
		});
	}

}
