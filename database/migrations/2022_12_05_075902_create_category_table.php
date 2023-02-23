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
        Schema::create('category', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_en');
            $table->string('category_urdu')->nullable();
            $table->string('category_ar');
            $table->string('slug')->nullable();
            $table->text('cat_image')->nullable();
            $table->tinyInteger('status')->comment('0 => Not Publish , 1 => Publish');
            $table->integer('menu_id')->nullable();
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
        Schema::dropIfExists('category');
    }
};
