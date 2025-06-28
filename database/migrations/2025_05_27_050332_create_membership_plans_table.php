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
        Schema::create('membership_plans', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('stripe_plan_id')->nullable();
            $table->string('billing_period'); // monthly, yearly, etc.
            $table->json('benefits')->nullable(); // Store benefits as JSON
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
        Schema::dropIfExists('membership_plans');
    }
};
