<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_actions', function (Blueprint $table) {
            $table->bigIncrements('File_Action_id');
            $table->string('File_Action_file_id');
            $table->string('File_Action_desk_id');
            $table->string('File_Action_emp_id');
            $table->string('File_Action_remark');
            $table->string('File_Action_Start_date');
            $table->string('File_Action_end_date');
            $table->string('File_Action_next_desk_id');
            $table->string('File_Action_no_of_warning');
            $table->string('File_Action_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_actions');
    }
}
