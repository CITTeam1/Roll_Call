<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Group;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $deptAccId = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21'];

        $deptDesc = ['Computer Services','Technology Engineering and Mathematics','Science Nursing and Allied Health','Liberal Arts','Communications and Performing Arts','Business','Behavioral and Social Science','Inovative Learning','Workforce Development','College Transition Programs','BPCC@Grambling','BPCC@LSUS','BPCC@NSU','BPCC@Tech','Unknown','Finance','Vice Chancellor','Chancellor','Human Resources','Student Life','Theatre'];

        $deptAcronym = ['CS','TEM','SNAH','LA','CAPA','BS','BSS','IL','WFD','CTP','BPCC@Grambling','BPCC@LSUS','BPCC@NSU','BPCC@Tech','U','FIN','VC','CH','HR','SL','TH'];

        $deptRole = ['CS','AD','AD','AD','AD','AD','AD','AD','AD','AD','AD','AD','AD','AD','AD','FI','VC','CH','HR','SL','TH'];

        Schema::create('groups', function (Blueprint $table) {
            $table->increments('dept_id')->unsigned();
            $table->integer('dept_acc_id');
            $table->string('dept_desc', 128);
            $table->string('dept_acronym', 64);
            $table->char('dept_role', 2);
            $table->string('dept_email')->nullable();
            $table->timestamps();
        });
        
 


        foreach ($deptAccId as $k => $v) {
            
                Group::create(
                [
                    'dept_acc_id' => $v,
                    'dept_desc' => $deptDesc[$k],
                    'dept_acronym' => $deptAcronym[$k],
                    'dept_role' => $deptRole[$k]
                ]
            );
         }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
