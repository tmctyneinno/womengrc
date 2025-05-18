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
        Schema::table('abouts', function (Blueprint $table) {
            $table->text('banner_one')->nullable()->after('header_image');
            $table->text('banner_two')->nullable()->after('banner_one');
            $table->text('banner_three')->nullable()->after('banner_two');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn(['banner_one', 'banner_two']);
            $table->dropColumn('banner_three');
        });
    }
};
