<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('adoption_historys', function (Blueprint $table) {
            // Change all relevant columns to be nullable
            $table->string('name')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('post_code')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('home_phone')->nullable()->change();
            $table->enum('have_yard', ['yes', 'no'])->nullable()->change();
            $table->enum('environment_situation', ['urban', 'fringe', 'rural'])->nullable()->change();
            $table->enum('house_type', ['apartment', 'house'])->nullable()->change();
            $table->enum('home_activity', ['active', 'calm', 'middle'])->nullable()->change();
            $table->enum('have_alergy', ['yes', 'no'])->nullable()->change();
            $table->integer('family_members')->nullable()->change();
            $table->integer('youngest_age')->nullable()->change();
            $table->enum('kids_visited', ['yes', 'no'])->nullable()->change();
            $table->integer('visited_age')->nullable()->change();
            $table->enum('have_roommate', ['yes', 'no'])->nullable()->change();
            $table->enum('have_other_pets', ['yes', 'no'])->nullable()->change();
            $table->text('describe_other_pets')->nullable()->change();
            $table->text('experience')->nullable()->change();
            $table->date('appointment_date')->nullable()->change();
            $table->time('appointment_time')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This method is intentionally left empty to prevent accidental data loss
        // by reverting columns back to NOT NULL.
    }
};
