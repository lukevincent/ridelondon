<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSplitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('splits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ride_london_id')->nullable();
            $table->integer('bib_number')->nullable();
            $table->string('split_name')->nullable();
            $table->time('time_of_day')->nullable();
            $table->time('duration')->nullable();
            $table->time('difference')->nullable();
            $table->time('min_per_km')->nullable();
            $table->double('avg_speed_km')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('splits');
    }
}
