<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonAddressTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_address', function($table)
        {
            $table  ->increments("id");
            
            $table  ->integer("person_id")
                    ->unsigned();
            
            $table  ->string("name");
            
            $table  ->string("address");
            
            $table  ->string("city");
    
            $table  ->string("state");
    
            $table  ->string("zipCode");
                
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
        Schema::drop('person_address');
    }
}
