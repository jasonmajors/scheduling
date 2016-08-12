<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->date('date')->unique();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
        });

        // Set FK
        Schema::table('appointment', function(Blueprint $table) {
            $table->foreign('day_id')->references('id')->on('days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('days');
    }
}
