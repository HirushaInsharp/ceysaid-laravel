<?php

use App\Models\Country;
use App\Models\CountryMedia;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->smallInteger('type')->default(CountryMedia::TYPE_FEATURE_IMAGE);
            $table->longText('image_path');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_media');
    }
}
