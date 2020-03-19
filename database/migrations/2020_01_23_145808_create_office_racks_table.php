<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeRacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_racks', function (Blueprint $table) {
            $table->bigIncrements('Office_Rack_id');
            $table->string('Office_Rack_office_id');
            $table->string('Office_Rack_department_id');
            $table->string('Office_Rack_title');
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
        Schema::dropIfExists('office_racks');
    }
}
