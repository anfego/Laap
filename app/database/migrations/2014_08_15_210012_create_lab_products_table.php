<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_product', function(Blueprint $table)
        {
            $table  ->increments('id');
            
            $table  ->string('name');
            
            $table  ->decimal('price',6,2);
            
            $table  ->enum("level", array('standard', 'special'));
            
            $table  ->enum("status", array('active', 'inactive'));
            
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
        Schema::drop('lab_product');
    }

}