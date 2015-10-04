<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropEmailFromPersonTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person', function(Blueprint $table)
        {
            if (Schema::hasColumn('person', 'email'))
            {
                $table ->dropColumn('email');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person', function(Blueprint $table)
        {
            if (!Schema::hasColumn('person', 'email'))
            {
                $table  ->string("email")
                        ->nullable()
                        ->default(null);
            }
        });
    }

}
