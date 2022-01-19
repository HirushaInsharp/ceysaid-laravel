<?php

use App\Models\TourData;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_data', function (Blueprint $table) {
            $table->id();
            $table->text('item');
            $table->unsignedBigInteger('tour_data_group_id');
            $table->timestamps();

            $table->foreign('tour_data_group_id')->references('id')->on('tour_data_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_data');
    }
}
