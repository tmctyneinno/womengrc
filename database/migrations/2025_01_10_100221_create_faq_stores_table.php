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
        Schema::create('faq_stores', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // User's name
            $table->string('email'); // User's email
            $table->string('phone_number'); // User's phone number
            $table->string('subject'); // Selected FAQ question as subject
            $table->text('message'); 
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
        Schema::dropIfExists('faq_stores');
    }
};
