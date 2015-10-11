<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function(Blueprint $table)
        {
            $table ->increments('id');
            
            $table ->integer("person_id")
                   ->unsigned();
            
            $table ->string("ref_name")
                   ->nullable()
                   ->default(null);

            $table ->string("state");
            
            $table ->string("city");
            
            $table ->string("country");
            
            $table ->string("street_l1");
            
            $table ->string("street_l2")
                   ->nullable()
                   ->default(null);
            
            $table ->string("street_l3")
                   ->nullable()
                   ->default(null);

            $table ->boolean('active')
                   ->default(true);
            
            $table ->boolean('primary')
                   ->default(false);

            $table  ->string("updated_by")
                    ->default('admin');

            $table ->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('address');
    }

}
