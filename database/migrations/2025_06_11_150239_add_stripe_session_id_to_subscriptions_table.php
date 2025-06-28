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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['membership_plan_id']);

            $table->unsignedBigInteger('membership_plan_id')->nullable()->change();

            $table->foreign('membership_plan_id')
                  ->references('id')
                  ->on('membership_plans2s')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['membership_plan_id']);

            $table->unsignedBigInteger('membership_plan_id')->nullable(false)->change();

            $table->foreign('membership_plan_id')
                  ->references('id')
                  ->on('membership_plans2s')
                  ->onDelete('cascade');
        });
    }
};
