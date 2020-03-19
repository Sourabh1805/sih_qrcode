<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_posts', function (Blueprint $table) {
            $table->bigIncrements('Office_Posts_id');
            $table->string('Office_Posts_title');
            $table->string('Office_Posts_description');
            $table->string('Office_Posts_status');
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
        Schema::dropIfExists('office_posts');
    }
}
