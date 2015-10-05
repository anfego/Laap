<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone', function(Blueprint $table)
        {
            $table ->increments('id');
            
            $table ->integer("person_id")
                   ->unsigned();
            
            $table ->string("ref_name")
                   ->nullable()
                   ->default(null);

            $table ->string("area_code")
                   ->nullable()
                   ->default(null);

            $table ->string("phone")
                   ->nullable()
                   ->default(null);
            
            $table ->boolean('active')
                   ->default(true);
            
            $table ->boolean('primary')
                   ->default(false);

            $table ->string("updated_by")
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
        Schema::drop('phone');
    }

}
