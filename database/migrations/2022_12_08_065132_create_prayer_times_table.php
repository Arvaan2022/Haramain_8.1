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
        Schema::create('prayer_times', function (Blueprint $table) {
            $table->increments('prayer_id');
            $table->bigInteger('category_id');
            $table->bigInteger('year');
            $table->string('month');
            $table->bigInteger('day')->nullable();
            $table->string('fajr')->nullable();
            $table->string('fajr_jamma')->nullable();
            $table->string('sunrise')->nullable();
            $table->string('sunrise_jamma')->nullable();
            $table->string('dhuhar')->nullable();
            $table->string('dhuhar_jamma')->nullable();
            $table->string('asr')->nullable();
            $table->string('asr_jamma')->nullable();
            $table->string('maghrib')->nullable();
            $table->string('maghrib_jamma')->nullable();
            $table->string('isha')->nullable();
            $table->string('isha_jamma')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('prayer_times');
    }
};
