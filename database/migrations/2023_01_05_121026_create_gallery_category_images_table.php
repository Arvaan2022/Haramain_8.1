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
        Schema::create('gallery_category_images', function (Blueprint $table) {
            $table->increments('gallery_category_image_id');
            $table->integer('gallery_category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('file_title_en')->nullable();
            $table->string('image_url')->nullable();
            $table->string('image_thumb_url')->nullable();
            $table->string('image_redirect_link')->nullable();
            $table->string('file_type')->nullable();
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
        Schema::dropIfExists('gallery_category_images');
    }
};
