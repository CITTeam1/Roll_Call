<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('events_dept_id')->unsigned();
            $table->string('events_title',256);
            $table->string('events_desc',3000);
            $table->string('events_banner_term',8);
            $table->string('events_term', 64);
            $table->datetime('events_start_datetime');
            $table->datetime('events_end_datetime');
            $table->char('events_admit_students')->nullable();
            $table->char('events_admit_employees')->nullable();
            $table->char('events_admit_guests')->nullable();
            $table->char('events_admit_out')->nullable();
            $table->string('events_creation_user_name',128);
            $table->string('events_updated_user_name',128);
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
        Schema::dropIfExists('events');
    }
}
