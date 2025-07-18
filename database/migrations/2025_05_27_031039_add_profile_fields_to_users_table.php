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
        Schema::table('users', function (Blueprint $table) {
            $table->string('twitter_profile')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->text('bio')->nullable();
            $table->string('expertise')->nullable();
            $table->integer('years_of_experience')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['twitter_profile','facebook_profile', 'bio', 'expertise', 'years_of_experience']);
        });
    }
};
