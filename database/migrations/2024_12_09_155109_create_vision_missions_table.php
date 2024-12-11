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
        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            $table->text('mission');
            $table->text('mission_img');
            $table->text('vision');
            $table->text('vision_img');
            $table->text('purpose');
            $table->text('purpose_img');
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
        Schema::dropIfExists('vision_missions');
    }
};
