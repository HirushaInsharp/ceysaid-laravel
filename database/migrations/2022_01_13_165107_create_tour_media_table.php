<?php

use App\Models\TourMedia;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->smallInteger('type')->default(TourMedia::TYPE_FEATURE_IMAGE);
            $table->longText('image_path');
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
        Schema::dropIfExists('tour_media');
    }
}
