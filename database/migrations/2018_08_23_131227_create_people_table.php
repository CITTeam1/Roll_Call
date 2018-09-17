<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Don't roll Back People Data, if you did I left it in the home folder

       //
        Schema::create('people', function (Blueprint $table) {
            $table->string('lid', 9)->primary();
            $table->string('term', 6);
            $table->string('last_name', 256);
            $table->string('first_name', 256);
            $table->char('student', 1);
            $table->char('employee', 1);
             $table->date('DOB');

        }); 

        include('/home/citadmin/RollCallPeople.php');
        DB::statement($sql);
    
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people'); 
    }
}
