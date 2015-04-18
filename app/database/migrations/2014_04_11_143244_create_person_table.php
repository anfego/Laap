<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    	Schema::create('person', function($table)
        {
            $table  ->increments("id");
            
            $table  ->string("peson_Id");

            $table  ->string("first_name")
                    ->nullable()
                    ->default(null) ;

            $table  ->string("last_name")
                    ->nullable()
                    ->default(null);
            
            $table  ->date("dob")
                    ->nullable()
                    ->default(null);
            
            $table  ->string("email")
                    ->nullable()
                    ->default(null);
            
            $table  ->string("updated_by");
            
            $table  ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('person');
    }
}