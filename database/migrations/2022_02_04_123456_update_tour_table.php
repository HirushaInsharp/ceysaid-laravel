<?php

use App\Models\Testimonial;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->integer('min_age')->default(12)->after('country_id');
            $table->integer('max_ppl')->default(20)->after('min_age');
            $table->string('start_place', 100)->nullable()->after('max_ppl');
            $table->date('start_date')->nullable()->after('start_at');
            $table->string('end_place', 100)->nullable()->after('start_date');
            $table->date('end_date')->nullable()->after('end_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
