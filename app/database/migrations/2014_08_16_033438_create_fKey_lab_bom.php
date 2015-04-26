<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKeyLabBom extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lab_bom', function(Blueprint $table)
        {
            $table  ->foreign( 'order_id' )  
                    ->references('id')
                    ->on('lab_order');
            
            $table  ->foreign( 'product_id' )
                    ->references('id')
                    ->on('lab_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lab_bom', function(Blueprint $table)
        {
            $table  ->dropForeign( 'lab_bom_order_id_foreign' );
            $table  ->dropForeign( 'lab_bom_product_id_foreign' );
        });
    }

}
