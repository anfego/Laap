<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_customer', function($table)
        {
            $table  ->increments("id");
            
            $table  ->string("name");
            
            $table  ->string("address");
            
            $table  ->integer("telephone");
            
            $table  ->string("email");
            
            $table  ->decimal("discountStd", 5, 2);
            
            $table  ->decimal("discountSpc", 5, 2);
            
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
        Schema::drop('lab_customer');
    }

}


