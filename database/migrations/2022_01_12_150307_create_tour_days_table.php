<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_days', function (Blueprint $table) {
            $table->id();
            $table->integer('day');
            $table->string('title', 150)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('tour_id');
            $table->timestamps();

            $table->foreign('tour_id')->references('id')->on('tours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_days');
    }
}
