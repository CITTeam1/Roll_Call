<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtraQueries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function($table) {
            $table->foreign('users_dept_id')->references('dept_id')->on('RollCall.groups');
        });
        
        Schema::table('admissions', function($table) {
            $table->foreign('admissions_event_id')->references('id')->on('RollCall.events')->onUpdate('cascade')->onDelete('cascade');
        });
     
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function($table) {
            $table->dropForeign('users_users_dept_id_foreign');
         });
        
        Schema::table('admissions', function($table) {
            $table->dropForeign('admissions_admissions_event_id_foreign');
        });
    }
}
