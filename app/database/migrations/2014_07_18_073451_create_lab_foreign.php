<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabForeign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders',function($table){
			$table	->	foreign('idCustomer')	->	references('id')	->	on('customer');
		});
		Schema::table('products_ordered',function($table){
			$table 	->	foreign( 'idOrder' )		->	references('id')	->	on('orders');
			$table 	->	foreign( 'idProduct' )	->	references('id')	->	on('products');
			$table 	->	primary( array( 'idOrder', 'idProduct' ));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::table('products_ordered',function($table){
		// 	$table 	->	dropForeign( 'idOrder' );
		// 	$table 	->	dropForeign( 'idProduct' );
		// 	$table 	->	dropPrimary( array( 'idOrder', 'idProduct' ));
		// });
		// Schema::table('orders',function($table){
		// 	$table	->	dropForeign('idCustomer');
		// });
	}

}
