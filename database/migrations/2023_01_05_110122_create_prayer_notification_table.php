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
        Schema::create('prayer_notification', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('prayer_id');
            $table->string('category');
            $table->string('date_time');
            $table->longText('fcm_token');
            $table->string('device_id');
            $table->tinyInteger('status_notification')->comment('0 => Not Send , 1 => Send');
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
        Schema::dropIfExists('prayer_notification');
    }
};
