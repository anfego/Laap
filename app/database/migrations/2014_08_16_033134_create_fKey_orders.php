<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKeyOrders extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lab_order', function(Blueprint $table)
        {
            $table  ->foreign('customer_id')
                    ->references('id')
                    ->on('lab_customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lab_order', function(Blueprint $table)
        {
            $table  ->dropForeign('lab_order_customer_id_foreign');
        });
    }

}
