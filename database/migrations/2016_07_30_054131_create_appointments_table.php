<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('first_name', 35);
            $table->string('last_name', 35);
            $table->string('email', 100);
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->tinyInteger('status_id')->nullable();
            $table->integer('day_id')->unsigned();
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
        Schema::dropIfExists('appointment');
    }
}