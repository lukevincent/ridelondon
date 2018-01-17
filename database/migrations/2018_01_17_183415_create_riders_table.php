<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ride_london_id')->nullable();
            $table->integer('bib_number')->nullable();
            $table->time('est_start_time')->nullable(); //new
            $table->string('name')->nullable();
            $table->string('age_group')->nullable();
            $table->string('club')->nullable();
            $table->string('event')->nullable();
            $table->string('event_state')->nullable(); // new
            $table->string('last_split')->nullable(); // new
            $table->time('finish_time')->nullable();
            $table->string('title');
            $table->string('nationalality');
            $table->boolean('flagged')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riders');
    }
}
