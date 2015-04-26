<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKeyExamPerson extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exam', function(Blueprint $table)
        {
            $table  ->foreign('person_id')  
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
        Schema::table('exam', function(Blueprint $table)
        {
            $table  ->dropForeign('exam_person_id_foreign');
        });
    }

}
