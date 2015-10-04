<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToAddressTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('address', function(Blueprint $table)
        {
            $table ->foreign('person_id')  
                   ->references('id')
                   ->on('person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address', function(Blueprint $table)
        {
            $table ->dropForeign('address_person_id_foreign');
        });
    }

}
