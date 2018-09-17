<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admissions_event_id')->unsigned();
            $table->string('admissions_lid',9);
            $table->string('admissions_first_name')->nullable();
            $table->string('admissions_last_name')->nullable();
            $table->char('admissions_student')->nullable();
            $table->char('admissions_employee')->nullable();
            $table->char('admissions_guest')->nullable();
            $table->datetime('admissions_admit_out_at')->nullable();
            $table->unique(['admissions_event_id', 'admissions_lid']);
             
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
