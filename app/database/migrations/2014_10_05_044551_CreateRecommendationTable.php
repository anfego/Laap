<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recommendation', function(Blueprint $table)
		{
			$table->increments('id');
			$table 
						->integer('examination_id')
						->unsigned();
			$table
						->text("remission");
						// ->default("");
			$table
						->text("treatment");
						// ->default("");
			$table
						->text("products");
						// ->default("");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recommendation');
	}

}
