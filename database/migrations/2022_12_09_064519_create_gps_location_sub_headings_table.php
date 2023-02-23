<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gps_location_sub_headings', function (Blueprint $table) {
            $table->increments('gps_sub_heading_id');
            $table->bigInteger('gps_heading_id');
            $table->string('gps_place_en');
            $table->string('gps_place_ar');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gps_location_sub_headings');
    }
};
