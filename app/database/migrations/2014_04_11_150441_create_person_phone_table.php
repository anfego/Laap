<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonPhoneTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_phone', function($table)
        {
            $table  ->increments("id");
            
            $table  ->integer("person_id")
                    ->unsigned();
            
            $table  ->string("phoneName");
            
            $table  ->string("phoneNumber");

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
        Schema::drop('person_phone');
    }

}