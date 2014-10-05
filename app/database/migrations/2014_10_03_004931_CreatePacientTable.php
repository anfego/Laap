<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pacient', function(Blueprint $table)
		{
			$table->increments("id");
			$table
						->string("first_name")
						->default("N/A") ;

			$table
						->string("last_name")
						->default("N/A");
			
			$table
						->string("address_home")
						->default("");
			
			$table
						->string("address_work")
						->default("");
						
			$table
						-> string("email")
						->default("");

			$table
						-> string("telephone")
						->default("");

			$table
						->date("dob")
						->nullable()
						->default(null);
			
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
		Schema::drop('pacient');
	}

}
