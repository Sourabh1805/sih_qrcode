<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeDesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_desks', function (Blueprint $table) {
            $table->bigIncrements('Office_Desk_id');
            $table->string('Office_Desk_office_id');
            $table->string('Office_Desk_department_id');
            $table->string('Office_Desk_title');
            $table->string('Office_Desk_time_requried');
            $table->string('Office_Desk_status');
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
        Schema::dropIfExists('office_desks');
    }
}
