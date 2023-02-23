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
        Schema::create('surah_list', function (Blueprint $table) {
            $table->increments('surah_id');
            $table->bigInteger('category_id');
            $table->bigInteger('sub_category_id');
            $table->bigInteger('imaam_id');
            $table->string('surah_name');
            $table->string('surah_urdu')->nullable();
            $table->string('surah_arabic')->nullable();
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
        Schema::dropIfExists('surah_list');
    }
};
