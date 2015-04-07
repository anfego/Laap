<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabBomTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_bom', function(Blueprint $table)
        {
            $table-> integer("order_id")-> unsigned();
            $table-> integer("product_id")-> unsigned();
            $table-> integer("quantity");
            $table-> decimal('price',7,2);
            $table-> decimal('discount',4,2);
            $table-> timestamps();
            $table-> primary(array('order_id','product_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lab_bom');
    }

}
