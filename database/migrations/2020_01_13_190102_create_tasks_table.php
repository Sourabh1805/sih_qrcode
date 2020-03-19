<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('Task_office_id');
            $table->string('Task_office_id');
            $table->string('Task_department_id');
            $table->string('Task_title');
            $table->string('Task_description');
            $table->string('Task_no_of_desk');
            $table->string('Task_desk_list');
            $table->string('Task_time_requried');
            $table->string('Task_time_status');
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
        Schema::dropIfExists('tasks');
    }
}
