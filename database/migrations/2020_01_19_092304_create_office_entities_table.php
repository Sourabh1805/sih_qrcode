<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_entities', function (Blueprint $table) {
            $table->bigIncrements('Office_Entity_id');
            $table->string('Office_Entity_type');
            $table->string('Office_Entity_mobile_number');
            $table->string('Office_Entity_password');
            $table->string('Office_Entity_email_id');
            $table->string('Office_Entity_name');
            $table->string('Office_Entity_office_id');
            $table->string('Office_Entity_department_id');
            $table->string('Office_Entity_office_post_id');
            $table->string('Office_Entity_desk_id');
            $table->string('Office_Entity_gender');
            $table->string('Office_Entity_address');
            $table->string('Office_Entity_city');
            $table->string('Office_Entity_pincode');
            $table->string('Office_Entity_status');
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
        Schema::dropIfExists('office_entities');
    }
}
