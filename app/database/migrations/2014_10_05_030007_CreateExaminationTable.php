<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('examination', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table 
						->integer('pacient_id')
						->unsigned();
			$table
						->integer('created_by')
						->unsigned();
			$table
						->string('ocupation')
						->default('');
			$table
						->text('motivation');
			$table
						->text('history');
			// AV
			$table
						->string('av_right')
						->default('0.00');
			$table
						->string('av_left')
						->default('0.00');
			// contact lenses 
			$table 
						->enum('clType', array( 'soft', 'hard', 'N/A'))
						->default('N/A');
			$table
						->string('cl_right')
						->default('0.00');
			$table
						->string('cl_left')
						->default('0.00');
			// Keratometer
			$table
						->string('kt_right')
						->default('0.00');
			$table
						->string('kt_left')
						->default('0.00');
			// Lensmetric
			$table
						->string('lx_right')
						->default('0.00');
			$table
						->string('lx_left')
						->default('0.00');
			$table
						->string('lx_add')
						->default('0.00');
			$table
						->string('lx_lenses')
						->default('');
			// Cycloplegic Refraction
			$table
						->string('cyclop')
						->default('0.00');
			$table
			// Final Refraction
						->string('rx_right')
						->default('0.00');
			$table
						->string('rx_left')
						->default('0.00');
			$table
						->string('rx_add')
						->default('0.00');
			// Ocular Motility
			$table
						->string('oc_motility')
						->default('');
			// Direct Ophthalmoscopy
			$table
						->text('dxOpthal');
			// Diagnostic
			$table
						->text('diagnostic');
			// Observations
			$table
						->text('observations');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('examination');
	}
}
