<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabOrdersHistoryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_orders_history', function(Blueprint $table)
        {
            $table-> integer('order_id')-> unsigned();
            $table-> enum("action", array( 'payment', 'closed', 'opened', 'delivered'));
            $table-> decimal('balance_old',8,2);
            $table-> decimal('balance_new',8,2);
            $table-> decimal('balance_dif',8,2);
            $table-> string("updated_by");
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lab_orders_history');
    }

}
