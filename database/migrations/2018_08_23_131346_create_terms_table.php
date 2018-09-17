<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Term;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->string('CODE',6)->primary();
            $table->string('TERM',128);
            $table->date('START');
            $table->date('END');
            $table->timestamps();
        });

        Term::create(
            [
                'CODE' => '201910',
                'TERM' => 'Fall 2018',
                'START' => '2018-08-01',
                'END' => '2018-12-31'
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms');
    }
}
