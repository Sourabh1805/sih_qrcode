<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileBunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_bunches', function (Blueprint $table) {
            $table->bigIncrements('File_Bunch_id');
            $table->string('File_Bunch_office_id');

            $table->string('File_Bunch_rack_id');
            $table->string('File_Bunch_title');
            $table->string('File_Bunch_year');
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
        Schema::dropIfExists('file_bunches');
    }
}
