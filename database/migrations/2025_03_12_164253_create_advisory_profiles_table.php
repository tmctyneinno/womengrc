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
        Schema::create('advisory_profiles', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('linkedin_profile')->nullable();
            $table->string('twitter_profile')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->text('bio')->nullable();
            $table->string('expertise')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advisory_profiles');
    }
};
