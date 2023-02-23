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
        Schema::create('maudhins', function (Blueprint $table) {
            $table->increments('maudhins_id');
            $table->bigInteger('category_id');
            $table->bigInteger('sub_category_id');
            $table->string('maudhins_en');
            $table->string('maudhins_urdu')->nullable();
            $table->string('maudhins_ar');
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
        Schema::dropIfExists('maudhins');
    }
};
