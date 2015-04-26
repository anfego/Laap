<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function(Blueprint $table)
        {
            $table  ->increments('id');
            
            $table  ->timestamps();
            
            $table  ->integer('person_id')
                    ->unsigned();
            
            $table  ->integer('created_by')
                    ->unsigned();
        // History            
            $table  ->string('ocupation')
                    ->nullable()
                    ->default(null);
            
            $table  ->text('motivation');
            
            $table  ->text('history');

        // AV
            $table  ->string('av_right')
                    ->nullable()
                    ->default(null);
            
            $table  ->string('av_left')
                    ->nullable()
                    ->default(null);

        // contact lenses 
            $table  ->integer('cl_Type')
                    ->unsigned();
            
            $table  ->string('cl_right')
                    ->nullable()
                    ->default(null);
            
            $table  ->string('cl_left')
                    ->nullable()
                    ->default(null);

        // Keratometer
            $table  ->string('kt_right')
                    ->nullable()
                    ->default(null);
            
            $table  ->string('kt_left')
                    ->nullable()
                    ->default(null);

        // Lensmetric
            $table  ->string('lx_right')
                    ->nullable()
                    ->default(null);
            
            $table  ->string('lx_left')
                    ->nullable()
                    ->default(null);
            
            $table  ->string('lx_add')
                    ->nullable()
                    ->default(null);
            //lenses type
            $table  ->integer('lx_lenses')
                    ->unsigned();

        // Cycloplegic Refraction
            $table  ->string('cyclop')
                    ->nullable()
                    ->default(null);

        // Final Refraction
            $table  ->string('rx_right')
                    ->nullable()
                    ->default(null);
            
            $table  ->string('rx_left')
                    ->nullable()
                    ->default(null);
            
            $table  ->string('rx_add')
                    ->nullable()
                    ->default(null);
        
        // Ocular Motility
            $table  ->string('oc_motility')
                    ->nullable()
                    ->default(null);

        // Direct Ophthalmoscopy
            $table  ->text('dx_Opthal');

        // Diagnostic
            $table  ->text('diagnostic');

        // Observations
            $table  ->text('observations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam');
    }
}
