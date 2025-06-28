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
        
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('certification_code')->unique();
            $table->integer('duration_hours')->nullable(); // optional: or use float if needed
            $table->date('due_date')->nullable();
            $table->boolean('is_required')->default(false);
            $table->string('certificate_template_path')->nullable();
            $table->timestamps();
            $table->softDeletes(); // for `deleted_at` support
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certifications');
    }
};
