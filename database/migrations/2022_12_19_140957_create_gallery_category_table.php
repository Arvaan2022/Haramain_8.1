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
        Schema::create('gallery_category', function (Blueprint $table) {
            $table->increments('gallery_category_id');
            $table->string('gallery_category_en');
            $table->string('gallery_category_ar');
            $table->string('slug')->nullable();
            $table->bigInteger('parent_id')->nullable()->default('0');
            $table->enum('upload_type',['IMAGE','PDF']);
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
        Schema::dropIfExists('gallery_category');
    }
};
