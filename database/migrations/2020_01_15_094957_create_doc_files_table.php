<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_files', function (Blueprint $table) {
            $table->bigIncrements('Doc_File_id');
            $table->string('Doc_File_QR_id');

            $table->string('Doc_File_initiator_id');
            $table->string('Doc_File_title');
            $table->string('Doc_File_office_id');
            $table->string('Doc_File_department_id');
            $table->string('Doc_File_subject');
            $table->string('Doc_File_remark');
            $table->string('Doc_File_start_date');
            $table->string('Doc_File_task_id');
            $table->string('Doc_File_end_date');
            $table->string('Doc_File_priority');
            $table->string('Doc_File_status');
            $table->string('Doc_File_rack_id');
            $table->string('Doc_File_bunch_id');


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
        Schema::dropIfExists('doc_files');
    }
}
