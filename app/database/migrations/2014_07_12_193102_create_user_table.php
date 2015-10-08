<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function($table){
            
            $table ->increments("id");
            
            $table ->string("username");

            $table ->string("first_name")
                   ->nullable()
                   ->default(null);

            $table ->string("last_name")
                   ->nullable()
                   ->default(null);
            
            $table ->string("prefered_name")
                   ->nullable()
                   ->default(null);

            $table ->string("title")
                   ->nullable()
                   ->default(null);

            $table ->string("password");
            
            $table ->string("email");
            
            $table ->boolean('active')
                   ->default(true);

            $table ->string("remember_token")
                   ->nullable();
            
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
        Schema::drop('user');
        
    }

}
