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
						->text('motivation')
						->default('');
			// VL
			$table
						->string('vl_right')
						->default('0.00');
			$table
						->string('vl_left')
						->default('0.00');
			// VP
			$table
						->string('vp_right')
						->default('0.00');
			$table
						->string('vp_left')
						->default('0.00');
			// PH
			$table
						->string('ph_right')
						->default('0.00');
			$table
						->string('ph_left')
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
						->string('ktX_right')
						->default('0.00');
			$table
						->string('kt_left')
						->default('0.00');
			$table
						->string('ktX_left')
						->default('0.00');
			// Lensmetric
			$table
						->string('lx_right')
						->default('0.00');
			$table
						->string('lxX_right')
						->default('0.00');
			$table
						->string('lx_left')
						->default('0.00');
			$table
						->string('lxX_left')
						->default('0.00');
			// Cycloplegic Refraction
			$table
						->string('cr_right')
						->default('0.00');
			$table
						->string('crX_right')
						->default('0.00');
			$table
						->string('cr_left')
						->default('0.00');
			$table
						->string('crX_left')
						->default('0.00');
			// Subjective
			$table
						->string('sub_right')
						->default('0.00');
			$table
						->string('subX_right')
						->default('0.00');
			$table
						->string('sub_left')
						->default('0.00');
			$table
						->string('subX_left')
						->default('0.00');
			$table
			// Final Refraction
						->string('rx_right')
						->default('0.00');
			$table
						->string('rxX_right')
						->default('0.00');
			$table
						->string('rx_left')
						->default('0.00');
			$table
						->string('rxX_left')
						->default('0.00');
			// Ocular Motility
			$table
						->string('hirschberg')
						->default('0');
			$table
						->string('ppc')
						->default('0');
			$table
						->string('coverTest')
						->default('0');
			// Direct Ophthalmoscopy
			$table
						->string('dxOpthal')
						->default('');
			// Observations
			$table
						->text('observations')
						->default('');
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
