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
        Schema::create('audio_data', function (Blueprint $table) {
            $table->id('audio_id');
            $table->integer('language_id');
            $table->text('data')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('m_id')->nullable();
            $table->integer('imaam_id')->nullable();
            $table->integer('surah_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->string('month_name')->nullable();
            $table->integer('admin_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio_data');
    }
};
