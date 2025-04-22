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
        Schema::table('dropdown_items', function (Blueprint $table) {
            // Add parent_id column after menu_item_id (or adjust position as needed)
            $table->unsignedBigInteger('parent_id')->nullable()->after('menu_item_id');

            // Add foreign key constraint for self-referencing relationship
            $table->foreign('parent_id')
                ->references('id')
                ->on('dropdown_items')
                ->onDelete('cascade'); // If a parent is deleted, delete its children
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dropdown_items', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn('parent_id');
        });
    }
};
