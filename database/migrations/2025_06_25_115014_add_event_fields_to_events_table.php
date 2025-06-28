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
        Schema::table('events', function (Blueprint $table) {
            $table->dateTime('start_time')->nullable()->after('image');
            $table->dateTime('end_time')->nullable()->after('start_time');
            $table->string('location')->nullable()->after('end_time');
            $table->boolean('is_online')->default(false)->after('location');
            $table->string('registration_url')->nullable()->after('is_online');
            $table->enum('status', ['draft', 'published', 'cancelled'])->default('draft')->after('registration_url');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'start_time',
                'end_time',
                'location',
                'is_online',
                'registration_url',
                'status'
            ]);
        });
    }
};
