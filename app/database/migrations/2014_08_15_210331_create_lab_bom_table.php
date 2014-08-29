<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabBomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lab_bom', function(Blueprint $table)
		{
			$table-> integer("idOrder")-> unsigned();
			$table-> integer("idProduct")-> unsigned();
			$table-> integer("quantity");
			$table-> decimal('price',4,2);
			$table-> decimal('discount',3,2);
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
		Schema::drop('lab_bom');
	}

}
