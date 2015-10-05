<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email', function(Blueprint $table)
        {
            $table ->increments('id');

            $table ->integer("person_id")
                   ->unsigned();
            
            $table ->string("ref_name")
                   ->nullable()
                   ->default(null);

            $table ->string("email")
                   ->nullable()
                   ->default(null);
            
            $table ->boolean('active')
                   ->default(true);

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
        Schema::drop('email');
    }

}
