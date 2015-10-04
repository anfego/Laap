<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToPhoneTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phone', function(Blueprint $table)
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
        Schema::table('phone', function(Blueprint $table)
        {
            $table ->dropForeign('phone_person_id_foreign');
        });
    }

}
