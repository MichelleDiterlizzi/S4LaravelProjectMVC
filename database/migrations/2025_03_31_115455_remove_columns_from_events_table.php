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
        // Only run if the events table exists
        if (Schema::hasTable('events')) {
            Schema::table('events', function (Blueprint $table) {
                // Check if columns exist before dropping them
                if (Schema::hasColumn('events', 'is_past')) {
                    $table->dropColumn('is_past');
                }
                if (Schema::hasColumn('events', 'attendees_count')) {
                    $table->dropColumn('attendees_count');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Only run if the events table exists
        if (Schema::hasTable('events')) {
            Schema::table('events', function (Blueprint $table) {
                // Only add columns if they don't exist
                if (!Schema::hasColumn('events', 'is_past')) {
                    $table->boolean('is_past')->default(false);
                }
                if (!Schema::hasColumn('events', 'attendees_count')) {
                    $table->integer('attendees_count')->default(0);
                }
            });
        }
    }
};
