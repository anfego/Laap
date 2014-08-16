<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabProductsOrderedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_products_ordered', function(Blueprint $table)
		{
			$table-> integer("idOrder")->unsigned();
			$table-> integer("idProduct")->unsigned();
			$table-> enum("level", array('standard', 'special'));
			$table-> integer("quantity");
			$table-> decimal('price');
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
		Schema::drop('lab_products_ordered');
	}

}
