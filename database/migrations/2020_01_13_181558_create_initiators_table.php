<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitiatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiators', function (Blueprint $table) {
            $table->bigIncrements('Initiator_id');
            $table->string('Initiator_mobile_number');
            $table->string('Initiator_password');
            $table->string('Initiator_email_id');
            $table->string('Initiator_name');
            $table->string('Initiator_department');
            $table->string('Initiator_gender');
            $table->string('Initiator_address');
            $table->string('Initiator_city');
            $table->string('Initiator_pincode');
            $table->string('Initiator_status');
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
        Schema::dropIfExists('initiators');
    }
}
