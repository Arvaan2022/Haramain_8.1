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
        Schema::create('imaams', function (Blueprint $table) {
            $table->increments('imaam_id');
            $table->bigInteger('category_id');
            $table->bigInteger('sub_category_id');
            $table->string('imaam_en');
            $table->text('imaam_description_en');
            $table->string('imaam_ar');
            $table->text('imaam_description_ar');
            $table->string('imaam_urdu')->nullable();
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
        Schema::dropIfExists('imaams');
    }
};
