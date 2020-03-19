<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_departments', function (Blueprint $table) {
            $table->bigIncrements('Office_Department_id');
            $table->string('Office_Department_title');
            $table->string('Office_Department_description');
            $table->string('Office_Department_initial');
            $table->string('Office_Department_status');



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
        Schema::dropIfExists('office_departments');
    }
}
