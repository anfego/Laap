<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('email', function(Blueprint $table)
		{
			$table ->foreign('person_id')  
             ->references('id')
             ->on('person');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('email', function(Blueprint $table)
		{
			$table ->dropForeign('email_person_id_foreign');
		});
	}

}
