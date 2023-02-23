<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('year', function (Blueprint $table) {
            $table->id('year_id');
            $table->string('year_en')->nullable();
            $table->string('year_ar')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('muharram')->nullable();
            $table->integer('safar')->nullable();
            $table->integer('rabiul_awwal')->nullable();
            $table->integer('rabiul_akhir')->nullable();
            $table->integer('jumadal_awwal')->nullable();
            $table->integer('jumadal_akhir')->nullable();
            $table->integer('rajab')->nullable();
            $table->integer('shabaan')->nullable();
            $table->integer('ramadhan')->nullable();
            $table->integer('shawaal')->nullable();
            $table->integer('dhul_qadah')->nullable();
            $table->integer('dhul_hijjah')->nullable();
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
        Schema::dropIfExists('year');
    }
};