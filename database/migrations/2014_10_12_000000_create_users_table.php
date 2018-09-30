<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Foundation\Auth\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_dept_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            
            $table->timestamps();
           
        }); 

        DB::table('users')->insert(

            ['users_dept_id' => '20', 'name' => 'Student Life', 'email' => 'studentlife@bpcc.edu', 'password' => Hash::make('roll123')]
            
        );

        DB::table('users')->insert(
            
            ['users_dept_id' => '21', 'name' => 'Theatre', 'email' => 'drama@bpcc.edu', 'password' => Hash::make('roll123')]
        );
        B::table('users')->insert( //Tried to make a new login using these credentials. Not sure why it isn't working.

            ['users_dept_id' => '21', 'name' => 'Test Login', 'email' => 'test@bpcc.edu', 'password' => Hash::make('roll123')]
            
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

       
        

        Schema::dropIfExists('users');
    }
}
