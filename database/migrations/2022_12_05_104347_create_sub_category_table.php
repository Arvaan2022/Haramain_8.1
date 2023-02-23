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
        Schema::create('sub_category', function (Blueprint $table) {
            $table->increments('sub_category_id');
            $table->bigInteger('category_id');
            $table->string('sub_category_en');
            $table->string('sub_category_urdu')->nullable();
            $table->string('sub_category_ar');
            $table->string('sub_category_icon')->nullable();
            $table->string('slug')->nullable();
            $table->string('add')->nullable();
            $table->tinyInteger('status')->comment('0 => Not Publish , 1 => Publish');
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
        Schema::dropIfExists('sub_category');
    }
};