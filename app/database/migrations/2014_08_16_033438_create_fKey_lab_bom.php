<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKeyLabBOM extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lab_bom', function(Blueprint $table)
		{
			$table-> foreign( 'idOrder' )	->references('id')-> on('orders');
			$table-> foreign( 'idProduct' )	->references('id')-> on('lab_products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lab_bom', function(Blueprint $table)
		{
			$table-> dropForeign( 'lab_bom_idorder_foreign' );
			$table-> dropForeign( 'lab_bom_idproduct_foreign' );
		});
	}

}
